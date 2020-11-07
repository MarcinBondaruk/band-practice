<?php
namespace App\Core\Shared\Exception;

use Throwable;

class InvalidArguments extends ApplicationException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
