<?php


namespace App\EventSubscriber;


use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Command;
use App\Entity\CommandItem;
use App\Entity\ShoppingCart;
use App\Entity\ShoppingCartItem;
use App\Entity\User;
use App\Exception\EmptyShoppingCartException;
use App\Security\StripeService;
use App\Services\CommandService;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class CommandEntityPostSubscriber implements EventSubscriberInterface
{

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;
    /**
     * @var EntityManagerInterface
     */
    private $manager;
    /**
     * @var StripeService
     */
    private $stripeService;
    /**
     * @var CommandService
     */
    private $commandService;

    public function __construct(TokenStorageInterface $tokenStorage, EntityManagerInterface $manager, StripeService $stripeService, CommandService $commandService)
    {
        $this->tokenStorage = $tokenStorage;
        $this->manager = $manager;

        $this->stripeService = $stripeService;
        $this->commandService = $commandService;
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW =>
                ["postSave", EventPriorities::POST_WRITE]
        ];
    }
    public function postSave(ViewEvent $event) {

        $command = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$command instanceof Command || !in_array($method, [Request::METHOD_POST, Request::METHOD_PUT]) ) {
            return;
        }

        /** @var User $customer */
        $customer = $this->tokenStorage->getToken()->getUser();
        /** @var ShoppingCart $shoppingCart */
        $cart =  $customer->getShoppingCart();
        $paymentIntent = null;

        try {
            if ($method == Request::METHOD_POST ) {
                $paymentIntent = $this->commandService->postSave($cart, $command);
            } else {
               $paymentIntent = $this->commandService->postUpdate($command);
            }
            $command->setClientSecret($paymentIntent->client_secret);
/*            $event->setResponse(
                new JsonResponse(
                    [
                        "command"=> [
                            "id" => $command->getId(),
                            "secondaryId" => $command->getSecondaryId(),
                            "totalAmount" => $command->getTotalAmount(),
                            "created" => $command->getCreated(),
                            "state"=> $command->getState(),
                            "commandItems"=> $command->getCommandItems()
                        ],
                        "clientSecret"=> $paymentIntent->client_secret
                    ],
                    Response::HTTP_CREATED
                )
            );*/
        } catch (\Exception $error ) {
            $event->setResponse(
                new JsonResponse(
                    ["error"=> $error->getMessage()],
                    Response::HTTP_NOT_ACCEPTABLE)
            );
        }

    }
}