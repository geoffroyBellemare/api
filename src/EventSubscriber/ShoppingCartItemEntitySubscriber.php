<?php


namespace App\EventSubscriber;


use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\CommandItem;
use App\Entity\ShoppingCart;
use App\Entity\ShoppingCartItem;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class ShoppingCartItemEntitySubscriber implements EventSubscriberInterface
{

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;
    /**
     * @var EntityManagerInterface
     */
    private $manager;

    public function __construct(TokenStorageInterface $tokenStorage, EntityManagerInterface $manager)
    {
        $this->tokenStorage = $tokenStorage;
        $this->manager = $manager;
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [KernelEvents::VIEW => ["setCustomerShoppingCart", EventPriorities::PRE_WRITE]];
    }

    public function setCustomerShoppingCart(ViewEvent $event) {
        $entity = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$entity instanceof ShoppingCartItem || !in_array($method, [Request::METHOD_DELETE, Request::METHOD_POST, Request::METHOD_PUT]) ) {
            return;
        }
        /** @var User $user */
        $token = $this->tokenStorage->getToken();
        if (!$token ) {
            return;
        }
        /** @var User $user */
        $user = $token->getUser();
        if (!$user instanceof User ) {
            throw new AccessDeniedHttpException();

        }
        $cart = $user->getShoppingCart();

        $prestation = $entity->getPrestation();

        $price = $prestation->getPrice() ;
        $quantity = 1;
        $totalAmount = 0;

        switch ($method) {
            case Request::METHOD_PUT:
                $quantity = $entity->getQuantity() + $quantity;
                $price = $price * $quantity;
                break;
            case Request::METHOD_POST:
                $cart->addItem($entity);
                break;
            case Request::METHOD_DELETE:
                if ($entity->getQuantity() === 1) {
                    $cart->removeItem($entity);
                } else {
                    $quantity = $entity->getQuantity() - $quantity;
                    $price = $price * $quantity;
                }

                break;
        }
        $entity->setQuantity($quantity);
        $entity->setTotalAmount($price);

        foreach ( $cart->getItems() as $item ) {
            if (!$item instanceof ShoppingCartItem)continue;
            $totalAmount = $totalAmount + $item->getTotalAmount();

        }

        $cart->setTotalAmount($totalAmount);

        if ( $method === Request::METHOD_DELETE){
            if ($entity->getQuantity() === 1)$this->manager->remove($entity);
            $this->manager->persist($cart);
            $this->manager->flush();
            if ($entity->getCart()->getExecutingCommand() ) {
                throw new NotAcceptableHttpException();
            }
            $event->setResponse(new JsonResponse(["totalAmount" => $totalAmount], Response::HTTP_OK));
        }


    }
}