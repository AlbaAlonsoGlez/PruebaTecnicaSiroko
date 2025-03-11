<?php

declare(strict_types=1);

namespace Exceptions;

use Exception;

final class ItemNotAvailableException extends Exception
{
    public function __construct()
    {
        parent::__construct("El producto no está disponible");
    }
}       