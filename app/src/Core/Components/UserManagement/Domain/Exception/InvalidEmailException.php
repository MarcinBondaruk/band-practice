<?php
namespace App\Core\Components\UserManagement\Domain\Exception;

use Throwable;

class InvalidEmailException extends \DomainException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
