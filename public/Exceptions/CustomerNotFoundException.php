<?php

declare(strict_types=1);

namespace Exceptions;

use Exception;

final class CustomerNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct("Cliente no encontrado");
    }
}