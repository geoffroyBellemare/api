<?php

namespace App\Exception;

use Throwable;

class EmptyShoppingCartException extends \Exception
{
    public function __construct(
        string $message = "",
        int $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct('The Shopping cart is Empty or all items are already commanded', 404, $previous);
    }
}