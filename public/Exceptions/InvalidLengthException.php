<?php
declare(strict_types=1);
namespace Exceptions;

use Exception;

final class InvalidLengthException extends Exception
{
    public function __construct()
    {
        parent::__construct("Postal Code must be 5 or 6 characters");
    }
}