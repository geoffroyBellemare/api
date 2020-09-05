<?php


namespace App\Controller;


use ApiPlatform\Core\Bridge\Symfony\Validator\Validator;
use ApiPlatform\Core\Exception\InvalidArgumentException;
use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Entity\Company;
use App\Entity\CompanyTokens;
use App\Entity\User;
use App\Security\StripeService;
use Doctrine\ORM\EntityManagerInterface;
use Stripe\Exception\InvalidRequestException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class CompanyTokensAction
{


    /**
     * @var ValidatorInterface
     */
    private $validator;
    /**
     * @var SerializerInterface
     */
    private $serializer;
    /**
     * @var StripeService
     */
    private $stripeService;
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(ValidatorInterface $validator, SerializerInterface $serializer, StripeService $stripeService, TokenStorageInterface $tokenStorage, EntityManagerInterface $entityManager)
    {


        $this->validator = $validator;
        $this->serializer = $serializer;
        $this->stripeService = $stripeService;
        $this->tokenStorage = $tokenStorage;
        $this->entityManager = $entityManager;
    }

    public function __invoke(Company $company = null, Request $request)
    {


        /** @var \App\Entity\CompanyTokens $entity */
        $entity = $this->serializer->deserialize($request->getContent(), CompanyTokens::class, "json");
        $this->validator->validate($entity);
        /** @var User $user */
        $user = $this->tokenStorage->getToken()->getUser();
        $account = null;
        $result = [];

        if ($request->getMethod() == Request::METHOD_POST) {

            try {
                $account = $this->stripeService->createAccount($entity->accountToken);
                //$this->stripeService->createExternalAccount($account->id, $entity->externalAccountToken);
               // $this->stripeService->createPerson($account->id, $entity->personToken);

//                $this->stripeService->updateAccount(
//                    $account->id,
//
//                        [
//                            'account_token' => $entity->accountToken,
//                        ]
//
//                );

                $company = new Company();
                $company->setAuthor($user);
                $company->setName("temp Name");
                $company->setAccountId($account->id);
                //$company->setStatus($entity->getStatus());
                $company->setSuccessStatus($entity->getStatus());
                $company->setStep(0);
                $company->setBusinessType($entity->getBusinessType());
                $user->setCompany($company);
                $this->entityManager->flush();
                $account = $this->stripeService->getAccount($account->id);
            } catch (\Exception $e) {
                throw new NotFoundHttpException($e->getMessage());
            }

            return new JsonResponse(
                [
                    "company" => $company,
                    "account" => $account
                ],
                Response::HTTP_OK)
                ;
        } else {

           try {
               $company =  $user->getCompany();
               $accountId =  $user->getCompany()->getAccountId();

               if ($entity->getPersonToken()) {

                   if (!$company->getPersonId()) {
                       $person = $this->stripeService->createPerson($accountId, $entity->personToken);
                       $company->setPersonId($person->id);
                   } else {
                       $this->stripeService->updatePerson($company->getPersonId(), $accountId, $entity->personToken);
                   }

               }

               if ($entity->getAccountToken()) {
                   $this->stripeService->updateAccount(
                       $accountId,
                       [
                           'account_token' => $entity->accountToken,
                       ]);
               }

               if ($entity->getExternalAccountToken()) {
                   $this->stripeService->createExternalAccount($accountId, $entity->externalAccountToken);
               }
               $company->setSuccessStatus($entity->getStatus());
               $company->setStep($entity->getStep());
               $this->entityManager->flush();
               $account = $this->stripeService->getAccount($accountId);

            } catch (\Exception $e) {
                throw new NotFoundHttpException($e->getMessage());
            }


        }


        return new JsonResponse(
            [
            "company" => $company,
            "account" => $account
            ],
            Response::HTTP_OK
        );
    }
}