<?php
namespace App\Validators\Constraints;


use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class AlreadyCompanyOwner extends Constraint
{
    public $message = 'You Already have a Company';

    public function validatedBy()
    {
        return get_class($this) . 'Validator';
    }

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}