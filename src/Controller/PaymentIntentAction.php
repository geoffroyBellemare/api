<?php


namespace App\Controller;


use App\Entity\ShoppingCart;
use App\Security\StripeService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PaymentIntentAction
{
    /**
     * @var StripeService
     */
    private $stripeService;

    function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    function __invoke(ShoppingCart $cart)
    {
        // TODO: Implement __invoke() method.
        $paymentIntent = $this->stripeService->createPaymentIntent($cart);
        if ($paymentIntent) {
            return new JsonResponse(["clientSecret"=>$paymentIntent->client_secret], Response::HTTP_OK);
        }
        return new JsonResponse("fail", Response::HTTP_FORBIDDEN);
    }

}