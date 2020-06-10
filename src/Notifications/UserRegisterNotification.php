<?php


namespace App\Notifications;

use App\Entity\Image;
use App\Entity\User;
use App\Upload\AwsS3;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;


class UserRegisterNotification
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

    public function postPersist(LifecycleEventArgs $args) {
        $entity = $args->getEntity();
        if (!$entity instanceof User) {
            return;
        }
        $imgUrl = $this->s3->getUserPreUrl($entity, "/users", ".jpeg");

        $image = new Image();
        $image->setAuthor($entity);
        $image->setUrl($imgUrl);

        $entity->setImageProfile($image);

        $this->manager->persist($entity);
        $this->manager->flush();

    }



}