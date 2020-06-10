<?php


namespace App\Controller;


use App\Entity\Command;
use App\Entity\ShoppingCart;
use App\Entity\User;
use App\Services\CommandService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class CommandIntentAction
{
    /**
     * @var CommandService
     */
    private $commandService;
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;


    function __construct(CommandService $commandService, TokenStorageInterface $tokenStorage)
    {
        $this->commandService = $commandService;

        $this->tokenStorage = $tokenStorage;
    }
    public function __invoke(Command $data)
    {
        /** @var User $customer */
        $customer = $this->tokenStorage->getToken()->getUser();
        /** @var ShoppingCart $shoppingCart */
        $cart =  $customer->getShoppingCart();

        try {
            $paymentIntent = $this->commandService->getIntent($data);
            return new JsonResponse($paymentIntent, Response::HTTP_OK);
        } catch (\Exception $error) {
            return new JsonResponse(["error"=> $error->getMessage()], Response::HTTP_NOT_ACCEPTABLE);
        }

    }

}