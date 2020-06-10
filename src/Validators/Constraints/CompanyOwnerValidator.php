<?php


namespace App\Validators\Constraints;


use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class CompanyOwnerValidator extends ConstraintValidator
{
    public $message = 'You must have registered a Company.';
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;


    public function __construct(TokenStorageInterface $tokenStorage)
    {

        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @inheritDoc
     */
    public function validate($value, Constraint $constraint)
    {
        if (null === $value || '' === $value) {
            return;
        }
        $token = $this->tokenStorage->getToken();
        $user = $token->getUser();
        if (!$user->getCompany()) {
            $this->context->buildViolation($constraint->message)
                ->atPath('prestation')
                ->addViolation();
        }
    }

}