<?php


namespace App\Validators\Constraints;




use Symfony\Component\Validator\Constraint;
/**
 * @Annotation
 */
class CompanyOwner extends Constraint
{
    public $message = 'You Must Register your Company.';
    public function validatedBy()
    {
        return get_class($this).'Validator';
    }

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}