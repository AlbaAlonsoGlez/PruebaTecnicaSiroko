<?php

declare(strict_types=1);

namespace Exceptions;

use Exception;

final class NotEnoughQuantityException extends Exception
{
    public function __construct()
    {
        parent::__construct("No hay suficiente cantidad del producto en el carrito");
    }
}