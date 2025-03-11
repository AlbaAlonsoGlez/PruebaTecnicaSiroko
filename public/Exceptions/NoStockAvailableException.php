<?php

declare(strict_types=1);

namespace Exceptions;

use Exception;

final class NoStockAvailableException extends Exception
{
    public function __construct()
    {
        parent::__construct("No hay stock disponible para el producto ");
    }
}