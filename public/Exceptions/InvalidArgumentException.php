<?php
declare(strict_types=1);
namespace Exceptions;

use Exception;

final class InvalidArgumentException extends Exception
{
    public function __construct()
    {
        parent::__construct("Postal Code must not start with '-'");
    }
}