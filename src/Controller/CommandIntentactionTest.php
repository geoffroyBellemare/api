<?php
namespace App\Controller;


use App\Entity\Command;
use App\Entity\ShoppingCart;
use App\Entity\User;
use App\Security\StripeService;
use App\Services\CommandService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class CommandIntentactionTest
{


    /**
     * @var StripeService
     */
    private $stripeService;

    function __construct(StripeService $stripeService)
    {

        $this->stripeService = $stripeService;
    }

    public function __invoke(Command $data)
    {
//        /** @var User $customer */
//        $customer = $this->tokenStorage->getToken()->getUser();
//        /** @var ShoppingCart $shoppingCart */
//        $cart = $customer->getShoppingCart();

        try {
            $paymentIntent = $this->stripeService->createPaymentIntentTest();
            return new JsonResponse($paymentIntent, Response::HTTP_OK);
        } catch (\Exception $error) {
            return new JsonResponse(["error" => $error->getMessage()], Response::HTTP_NOT_ACCEPTABLE);
        }

    }

}