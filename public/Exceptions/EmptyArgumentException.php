<?php
declare(strict_types=1);
namespace Exceptions;

use Exception;

final class EmptyArgumentException extends Exception
{
    public function __construct()
    {
        parent::__construct("Campo requerido");
    }
}