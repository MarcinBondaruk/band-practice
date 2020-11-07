<?php
namespace App\Core\Components\UserManagement\Application\Write\Exception;

use App\Core\Shared\Exception\ApplicationException;
use Throwable;

class CannotRegisterUser extends ApplicationException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
