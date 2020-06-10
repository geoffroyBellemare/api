<?php

namespace App\Controller;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Entity\Command;
use App\Entity\User;
use App\Security\StripeService;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CreateCheckoutSession
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


    public function __construct(
        ValidatorInterface $validator,
        UserPasswordEncoderInterface $userPasswordEncoder,
        EntityManagerInterface $entityManager,
        StripeService $stripeService
    )
    {
        $this->validator = $validator;
        $this->userPasswordEncoder = $userPasswordEncoder;
        $this->entityManager = $entityManager;
        $this->stripeService = $stripeService;
    }

    public function __invoke(Command $data)
    {

        $checkoutSession = $this->stripeService->createSession($data);
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

        return new JsonResponse([
            'checkoutSession' => $checkoutSession
        ]);

        // Validator is only called after we return the data from this action!
        // Only hear it checks for user current password, but we've just modified it!

        // Entity is persisted automatically, only if validation pass
    }
}
