<?php

namespace App\Validators\Constraints;


use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class AlreadyCompanyOwnerValidator extends ConstraintValidator
{
    public $message = 'You Already have a Company.';
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;
    /**
     * @var RequestStack
     */
    private $requestStack;


    public function __construct(TokenStorageInterface $tokenStorage, RequestStack $requestStack)
    {

        $this->tokenStorage = $tokenStorage;
        $this->requestStack = $requestStack;

    }

    /**
     * @inheritDoc
     */
    public function validate($value, Constraint $constraint)
    {
        $request = $this->requestStack->getCurrentRequest();
        if (null === $value || '' === $value) {
            return;
        }
        $token = $this->tokenStorage->getToken();
        $user = $token->getUser();
        if ($request->getMethod() == Request::METHOD_POST) {
            if ($user->getCompany()) {
                $this->context->buildViolation("Already Have register Your Company")
                    ->atPath('company')
                    ->addViolation();
            }
        }
        if ($request->getMethod() == Request::METHOD_PUT) {
            if (!$user->getCompany()) {
                $this->context->buildViolation("You must register Your Company before")
                    ->atPath('company')
                    ->addViolation();
            }
        }



    }

}