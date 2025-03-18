<?php

declare(strict_types=1);

namespace Exceptions;

use Exception;

final class ProductNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct("No se encuentra el producto en el carrito");
    }
}