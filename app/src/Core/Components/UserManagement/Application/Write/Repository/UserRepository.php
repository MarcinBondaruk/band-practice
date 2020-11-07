<?php
namespace App\Core\Components\UserManagement\Application\Write\Repository;

use App\Core\Components\UserManagement\Domain\Entity\User;

interface UserRepository
{
    public function create(User $user): void;
    public function doesUserExist(string $email): bool;
}
