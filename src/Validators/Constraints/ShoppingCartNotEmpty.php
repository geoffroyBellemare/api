<?php
namespace App\Validators\Constraints;


use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ShoppingCartNotEmpty extends Constraint
{
    public $message = 'Please Select some Prestation Before';

    public function validatedBy()
    {
        return get_class($this) . 'Validator';
    }

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}