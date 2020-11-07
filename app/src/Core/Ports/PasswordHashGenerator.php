<?php
namespace App\Core\Ports;

interface PasswordHashGenerator
{
    public function getPasswordHash(string $password): string;
}
