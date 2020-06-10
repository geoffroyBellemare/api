<?php


namespace App\EventSubscriber;



use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\EphemeralKey;
use App\Entity\User;
use App\Security\StripeService;
use Symfony\Component\HttpFoundation\Response;
use Lexik\Bundle\JWTAuthenticationBundle\Event\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class EphemeralKeyEventSubscriber implements EventSubscriberInterface
{

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;
    /**
     * @var StripeService
     */
    private $stripeService;

    public function __construct(TokenStorageInterface $tokenStorage, StripeService $stripeService)
    {
        $this->tokenStorage = $tokenStorage;
        $this->stripeService = $stripeService;
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [KernelEvents::VIEW => ["setEphemeralKey", EventPriorities::POST_VALIDATE]];
    }

    public  function setEphemeralKey(ViewEvent $event) {
        $request = $event->getRequest();
        $ephemeral = $event->getControllerResult();
        if ('api_ephemeral_keys_post_collection' !==
            $request->get('_route')) {
            return;
        }
        if (!$ephemeral instanceof EphemeralKey) {
            return;
        }

        /** @var User $user */
        $user = $this->tokenStorage->getToken()->getUser();
        $key = $this->stripeService->createEphemeralKey($user->getSecondaryId(), $ephemeral->version);

        if ($key) {
            $event->setResponse(new JsonResponse($key, Response::HTTP_OK));
        } else {
            $event->setResponse(new JsonResponse($this->stripeService->error, Response::HTTP_BAD_REQUEST));
        }

    }
}