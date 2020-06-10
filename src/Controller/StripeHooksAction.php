<?php
namespace App\Controller;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Entity\Command;
use App\Entity\ShoppingCart;
use App\Entity\ShoppingCartItem;
use App\Entity\User;
use App\Repository\CommandRepository;
use App\Repository\ShoppingCartRepository;
use App\Security\StripeService;
use App\Services\CommandService;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Stripe\Event;
use Stripe\Stripe;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class StripeHooksAction
{
    /**
     * @var ValidatorInterface
     */
    private $validator;
    /**
     * @var UserPasswordEncoderInterface
     */
    private $userPasswordEncoder;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var StripeService
     */
    private $stripeService;
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var CommandRepository
     */
    private $commandRepository;
    /**
     * @var CommandService
     */
    private $commandService;
    /**
     * @var ShoppingCartRepository
     */
    private $cartRepository;


    public function __construct(
        ValidatorInterface $validator,
        UserPasswordEncoderInterface $userPasswordEncoder,
        EntityManagerInterface $entityManager,
        StripeService $stripeService,
        ShoppingCartRepository $cartRepository,
        CommandRepository $commandRepository,
        CommandService $commandService,
        LoggerInterface $logger
    )
    {
        $this->validator = $validator;
        $this->userPasswordEncoder = $userPasswordEncoder;
        $this->entityManager = $entityManager;
        $this->stripeService = $stripeService;

        $this->logger = $logger;
        $this->commandRepository = $commandRepository;
        $this->commandService = $commandService;
        $this->cartRepository = $cartRepository;
    }

    public function __invoke(Request $request)
    {

        $this->logger->debug("Stripe hooks");
        // $reset = new ResetPasswordAction();
        // $reset();

//        die;
//        $this->validator->validate($data);
//
//        $data->setPassword(
//            $this->userPasswordEncoder->encodePassword(
//                $data, $data->getNewPassword()
//            )
//        );
//        // After password change, old tokens are still valid
//        $data->setPasswordChangedDate(time());
//
//        $this->entityManager->flush();
//
//        $token = $this->tokenManager->create($data);

        try {
            $event = Event::constructFrom(json_decode($request->getContent(), true));
        } catch(\UnexpectedValueException $e) {
            return new JsonResponse(null, Response::HTTP_NOT_ACCEPTABLE);
        }
        switch ($event->type) {
            case 'checkout.session.completed':
                $checkOutSessionID = $event->data->object->id;
                $checkOutSessionID = "cs_test_xiyjTtscNlqxkfZCHDSdL6YtBostIxTGLqSBKW0mEP93fVigZmZKKGeJ";
                $command = $this->commandService->checkOutSessionCompleted($checkOutSessionID);

                return new JsonResponse($command->getState());
           // return new JsonResponse($command[0]->getCheckOutSessionID());
                break;
            case 'payment_intent.created':
                $paymentIntent = $event->data->object; // contains a \Stripe\PaymentIntent
                $this->logger->debug("payment_intent.created");
                $this->logger->debug($paymentIntent["id"]);
                return new JsonResponse($paymentIntent, Response::HTTP_ACCEPTED);
                break;
            case 'payment_intent.succeeded':
                $paymentIntent = $event->data->object; // contains a \Stripe\PaymentIntent
                $metadata = $paymentIntent["metadata"];
                //$metadata = ["order_id" => 2621];
                $command = $this->commandRepository->findOneBy(["id"=> $metadata["order_id"]]);
                /** @var ShoppingCart $cart */
                $cart = $command->getCustomer()->getShoppingCart();
                if (!$command || !$cart) {
                    return new JsonResponse(["error"=> "can t finish payment process no user or command for that request"], Response::HTTP_FOUND);
                }
                $command->setState("succeed");
                foreach ( $command->getShoppingCartItems() as $cartItem) {
                    if (!$cartItem instanceof ShoppingCartItem) continue;
                    if ($cart->getItems()->contains($cartItem)) {
                        $cart->setTotalAmount($cart->getTotalAmount() - $cartItem->getTotalAmount());
                        $cart->removeItem($cartItem);
                        $this->entityManager->remove($cartItem);
                    }
                }
                $cart->setExecutingCommand(null);
                $this->entityManager->flush();
//                $this->logger->debug("payment_intent.succeeded");
//                $this->logger->debug($paymentIntent["id"]);
                return new JsonResponse($paymentIntent["id"], Response::HTTP_ACCEPTED);
                // Then define and call a method to handle the successful payment intent.
                // handlePaymentIntentSucceeded($paymentIntent);
                break;
            case 'payment_method.attached':
                $paymentMethod = $event->data->object; // contains a \Stripe\PaymentMethod
                // Then define and call a method to handle the successful attachment of a PaymentMethod.
                // handlePaymentMethodAttached($paymentMethod);
                break;
            // ... handle other event types
            default:
                // Unexpected event type
                http_response_code(400);
                exit();
        }

        return new JsonResponse([
            'webhook' => $request->getContent()
        ]);

        // Validator is only called after we return the data from this action!
        // Only hear it checks for user current password, but we've just modified it!

        // Entity is persisted automatically, only if validation pass
    }
}
