<?php
namespace App\Infrastructure\Port\PasswordHashGenerator;

use App\Core\Ports\PasswordHashGenerator;

class PhpPasswordHashGenerator implements PasswordHashGenerator
{
    public function getPasswordHash(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
