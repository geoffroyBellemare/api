<?php


namespace App\EventSubscriber;



use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Image;
use App\Entity\ShoppingCart;
use App\Entity\User;
use App\Mailer\Mailer;
use App\Security\TokenGenerator;
use App\Upload\AwsS3;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserRegisterImageProfileSubscriber implements EventSubscriberInterface
{


    /**
     * @var AwsS3
     */
    private $s3;
    /**
     * @var EntityManagerInterface
     */
    private $manager;


    public function __construct(AwsS3 $s3, EntityManagerInterface $manager)
    {

        $this->s3 = $s3;
        $this->manager = $manager;
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ["userProfileImgRegistered", EventPriorities::POST_WRITE]
        ];
    }

    public function userProfileImgRegistered(ViewEvent $event)
    {

        $entity = $event->getControllerResult();
        $methods = $event->getRequest()->getMethod();

        if (!$entity instanceof User || !in_array($methods, [Request::METHOD_POST])) {
            return;
        }


        if(!$entity->getImageProfile()) {
            $imgUrl = $this->s3->getUserPreUrl($entity, "profile", ".jpeg");

            $image = new Image();
            $image->setAuthor($entity);
            $image->setUrl($imgUrl);

            $entity->setImageProfile($image);

            $this->manager->persist($entity);
            $this->manager->flush();

        }


    }
}