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

class CommandEntitySubscriber implements EventSubscriberInterface
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
                ["save", EventPriorities::PRE_WRITE],
        ];
    }

    public function save(ViewEvent $event) {

        $command = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$command instanceof Command || !in_array($method, [Request::METHOD_POST, Request::METHOD_PUT]) ) {
            return;
        }
         /** @var User $customer */
         $customer = $this->tokenStorage->getToken()->getUser();
         /** @var ShoppingCart $shoppingCart */
         $cart =  $customer->getShoppingCart();
        try {
            if (!$command->getId()) {
                $this->commandService->save($cart, $customer, $command);
            } else {
                $this->commandService->update($cart, $customer, $command);
            }
        } catch (\Exception $error) {
            $event->setResponse(new JsonResponse(["error"=> $error->getMessage()], Response::HTTP_NOT_ACCEPTABLE));
        }





//        $checkoutSession = $this->stripeService->createCartSession($shoppingCart);
//        $this->commandService->prepare($shoppingCart, $currentUser, $command);
//        if (!$checkoutSession) {
//            $event->setResponse(new JsonResponse(["hydra:description"=> $this->stripeService->error .": Can t send command to Stripe"], Response::HTTP_NOT_ACCEPTABLE));
//            return;
//        }
//        $command->setCheckOutSessionID($checkoutSession["id"]);


    }
}