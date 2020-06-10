<?php


namespace App\EventSubscriber;


use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Image;
use App\Entity\ShoppingCart;
use App\Entity\User;
use App\Mailer\Mailer;
use App\Security\StripeService;
use App\Security\TokenGenerator;
use App\Upload\AwsS3;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserRegisterSubscriber implements EventSubscriberInterface
{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;
    /**
     * @var TokenGenerator
     */
    private $tokenGenerator;
    /**
     * @var Mailer
     */
    private $mailer;
    /**
     * @var AwsS3
     */
    private $s3;
    /**
     * @var StripeService
     */
    private $stripeService;


    public function __construct(
        UserPasswordEncoderInterface $passwordEncoder,
        TokenGenerator $tokenGenerator,
        Mailer $mailer,
        AwsS3 $s3,
        StripeService $stripeService

    )
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->tokenGenerator = $tokenGenerator;

        $this->mailer = $mailer;
        $this->s3 = $s3;
        $this->stripeService = $stripeService;
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW=> ["userRegistered", EventPriorities::PRE_WRITE]
        ];
    }

    public function userRegistered(ViewEvent $event) {

        $entity = $event->getControllerResult();
        $methods = $event->getRequest()->getMethod();

        if (!$entity instanceof User || !in_array($methods, [Request::METHOD_POST]) ) {
            return;
        }


        $shoppingCart = new ShoppingCart();
        $shoppingCart->setTotalAmount(0);
        $shoppingCart->setCustomer($entity);

        $entity->setShoppingCart($shoppingCart);
        $entity->setConfirmationToken($this->tokenGenerator->getRandomSecureToken());

        $entity->setPassword($this->passwordEncoder->encodePassword($entity, $entity->getPassword()));
        $secondaryId = $this->stripeService->createCustomer($entity);
        if ($secondaryId) {
            $entity->setSecondaryId($this->stripeService->createCustomer($entity));
        }

        $this->mailer->sendConfirmationUser($entity);

    }
}