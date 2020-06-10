<?php


namespace App\Validators\Constraints;

use App\Entity\Command;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


class ShoppingCartNotEmptyValidator extends ConstraintValidator
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
        if (!$constraint instanceof ShoppingCartNotEmpty) {
            return;
        }
        if (!$value instanceof Command) {
            return;
        }
        $token = $this->tokenStorage->getToken();
        /** @var User $user */
        $user = $token->getUser();
        if (count($user->getShoppingCart()->getItems()->toArray()) < 1) {
            $this->context->buildViolation($constraint->message)
                ->atPath('prestation')
                ->addViolation();
        }
    }
}