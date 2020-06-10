<?php


namespace App\Services;


use App\Entity\Command;
use App\Entity\ShoppingCart;
use App\Entity\ShoppingCartItem;
use App\Entity\User;
use App\Exception\EmptyShoppingCartException;
use App\Mailer\Mailer;
use App\Repository\CommandRepository;
use App\Repository\ShoppingCartItemRepository;
use App\Security\StripeService;
use Doctrine\ORM\EntityManagerInterface;
use Stripe\Exception\InvalidRequestException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class CommandService
{
    /**
     * @var Mailer
     */
    private $mailer;
    /**
     * @var CommandRepository
     */
    private $commandRepository;
    /**
     * @var EntityManagerInterface
     */
    private $manager;
    /**
     * @var ShoppingCartItemRepository
     */
    private $cartItemRepository;
    /**
     * @var StripeService
     */
    private $stripeService;

    public function __construct(Mailer $mailer, CommandRepository $commandRepository, ShoppingCartItemRepository $cartItemRepository, EntityManagerInterface $manager, StripeService $stripeService)
    {
        $this->mailer = $mailer;
        $this->commandRepository = $commandRepository;
        $this->manager = $manager;
        $this->cartItemRepository = $cartItemRepository;
        $this->stripeService = $stripeService;
    }

    /**
     * @param Command $command
     * @return \Stripe\PaymentIntent|null
     * @throws \Exception
     */
    public function getIntent(Command $command) {

        $paymentIntent =  $this->stripeService->retrievePaymentIntent($command);

        if (!$paymentIntent) {
            throw new \Exception($this->stripeService->getError());
        }
        return $paymentIntent;
    }

    /**
     * @param ShoppingCart $shoppingCart
     * @param User $customer
     * @param Command $command
     * @throws \Exception
     */
    public function update( ShoppingCart $shoppingCart, User $customer, Command $command )
    {

        $totalAmount = 0;
        foreach ( $shoppingCart->getItems() as $item) {
            if (!$item instanceof ShoppingCartItem) continue;
            //if ($item->getCheckOutSessionID()) continue;
            if(!$command->getShoppingCartItems()->contains($item) || !$item->getCommand()) {
                $command->addCartItem($item);
                $command->shoppingCartItems[] = $item;
                $item->setCommand($command);
            }

            if ($item->getCommand()->getId() == $command->getId() || !$item->getCommand()) {
                $totalAmount = $totalAmount + $item->getQuantity() * $item->getPrestation()->getPrice();
            }

        }
        $command->setTotalAmount($totalAmount);
        //$command->setTotalAmount(30);
        $paymentIntent = $this->stripeService->updatePaymentIntent($command);

        if (!$paymentIntent) {
            throw new \Exception($this->stripeService->getError());
        }
        $this->manager->flush();
    }
    public function save(ShoppingCart $shoppingCart, User $customer, Command $command)
    {
        $command->setCustomer($customer);
        $command->setCreated(new \DateTime());
        $command->setState("ready");

        $totalAmount = 0;
        foreach ( $shoppingCart->getItems() as $item) {
            if (!$item instanceof ShoppingCartItem) continue;
            if ($item->getCommand()) continue;

            $command->addCartItem($item);
            $command->shoppingCartItems[] = $item;
            $item->setCommand($command);

            $totalAmount = $totalAmount + $item->getQuantity() * $item->getPrestation()->getPrice();
        }
        $command->setTotalAmount($totalAmount);
        //$command->setTotalAmount(10);
    }

    /**
     * @param ShoppingCart $cart
     * @param Command $command
     * @return \Stripe\PaymentIntent|null
     * @throws \Exception
     */
    public function postSave( ShoppingCart $cart, Command $command)
    {

        $paymentIntent = $this->stripeService->createPaymentIntent($command);
        if (!$paymentIntent)
            throw new \Exception($this->stripeService->getError(), Response::HTTP_PRECONDITION_FAILED);

        $command->setSecondaryId($paymentIntent->id);
        $cart->setExecutingCommand($command);
        $this->manager->flush();
        return $paymentIntent;
    }

    /**
     * @param Command $command
     * @return \Stripe\PaymentIntent|null
     * @throws \Exception
     */
    public function postUpdate(Command $command)
    {
        $paymentIntent = $this->stripeService->updatePaymentIntent($command);

        if (!$paymentIntent) {
            throw new \Exception($this->stripeService->getError());
        }
        return $paymentIntent;
    }
    public function createWithCheckoutSession(ShoppingCart $cart, User $customer, Command $command)
    {
        $checkoutSession = $this->stripeService->createCartSession($cart);
        $this->prepare($cart, $customer, $command);
        if (!$checkoutSession) {
            throw new \Exception($this->stripeService->getError(), Response::HTTP_NOT_ACCEPTABLE);
        }
        $command->setCheckOutSessionID($checkoutSession["id"]);
    }

    /**
     * @param ShoppingCart $shoppingCart
     * @param User $customer
     * @param Command $command
     */
    public function prepare( ShoppingCart $shoppingCart, User $customer, Command $command)
    {

        $totalAmount = 0;

        foreach ( $shoppingCart->getItems() as $item) {
            if (!$item instanceof ShoppingCartItem) continue;
            //if ($item->getCheckOutSessionID()) continue;

                $command->addCartItem($item);
                $totalAmount = $totalAmount + $item->getQuantity() * $item->getPrestation()->getPrice();


        }


            $command->setCustomer($customer);
            $command->setCreated(new \DateTime());
            $command->setState("initial");
            $command->setTotalAmount($totalAmount);



    }
    /**
     * @param String $checkOutSessionID
     * @return Command|Command[]|ShoppingCartItem[]|null
     */
    public function checkOutSessionCompleted(String $checkOutSessionID)
    {
        $command = $this->commandRepository->findOneBy(["checkOutSessionID"=> $checkOutSessionID]);
        $items = $this->cartItemRepository->findBy(["checkOutSessionID"=> $checkOutSessionID]);
        if (!$command)return null;
        if(!count($items)) return null;


        /** @var ShoppingCart $cart */
        $cart = $items[0]->getCart();
        /** @var ShoppingCartItem[] $cartItems */
        $cartItems = $cart->getItems();
        $totalAmount = 0;
        foreach ($cartItems as $item) {
            if ($item->getCheckOutSessionID() !== $checkOutSessionID) {
                $totalAmount = $totalAmount + $item->totalAmount;
            } else {
               // $item->setCheckOutSessionID("over");

                $company = $item->getPrestation()->getCompany();
                $customer = $command->getCustomer();
                $this->mailer->sendConfirmation($command);
//                $this->mailer->sendConfirmationCommand($company);
//                $this->mailer->sendConfirmationCommand($customer);
                $this->manager->remove($item);
            }

        }

        $cart->setTotalAmount($totalAmount);
        $command->setState("payed");
        //ne pas envoyer plusieurs mail a la meme company
        //supprimer les articles du panier ????
//        foreach ($items as $shoppingCartItem) {
//            /** @var ShoppingCartItem $shoppingCartItem */
//
////            $company = $shoppingCartItem->getPrestation()->getCompany();
////            $customer = $command->getCustomer();
////            $this->mailer->sendConfirmationCommand($company);
////            $this->mailer->sendConfirmationCommand($customer);
//
//            //$this->manager->persist($shoppingCartItem);
//           // $this->manager->remove($shoppingCartItem);
//        }
        $this->manager->flush();
        return $command;
    }
}