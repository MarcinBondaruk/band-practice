<?php
namespace App\Core\Components\UserManagement\Application\Write\Command;

use App\Core\Shared\Exception\InvalidArguments;

class CreateUserCommand
{
    private string $email;
    private string $password;

    public function __construct(
        string $email,
        string $password
    ) {
        if (empty($email) || empty($password)) {
            throw new InvalidArguments('empty_password_or_email');
        }

        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function password(): string
    {
        return $this->password;
    }
}
