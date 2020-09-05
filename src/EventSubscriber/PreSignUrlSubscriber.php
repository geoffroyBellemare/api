<?php


namespace App\EventSubscriber;


use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\ImagePreSignUrl;
use App\Upload\AwsS3;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class PreSignUrlSubscriber implements  EventSubscriberInterface
{

    /**
     * @var AwsS3
     */
    private $awsS3;

    public function __construct(AwsS3 $awsS3)
    {


        $this->awsS3 = $awsS3;
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [KernelEvents::VIEW => ["preSignUrl", EventPriorities::POST_VALIDATE]];
    }

    public function preSignUrl(ViewEvent $event)
    {
        $request = $event->getRequest();
        $entity = $event->getControllerResult();
        if ('api_image_pre_sign_urls_post_collection' !==
            $request->get('_route') && !$entity instanceof ImagePreSignUrl) {
            return;
        }

        

        $event->setResponse(new JsonResponse(["preSignUrl" => $this->awsS3->preSignUrl()], Response::HTTP_OK));
    }
}