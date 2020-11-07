<?php
namespace App\Core\Components\UserManagement\Domain\Entity;

use App\Core\Components\UserManagement\Domain\Exception\InvalidEmailException;
use App\Core\Components\UserManagement\Domain\ValueObject\PersonalInformation;

class User
{
    private string $email;
    private string $passwordHash;
    private PersonalInformation $personalInformation;

    public function __construct(
        string $email,
        string $passwordHash,
        PersonalInformation $personalInformation
    ) {
        $this->setEmail($email);
        $this->passwordHash = $passwordHash;
        $this->personalInformation = $personalInformation;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function passwordHash(): string
    {
        return $this->passwordHash;
    }

    public function personalInformation(): PersonalInformation
    {
        return $this->personalInformation;
    }

    private function setEmail(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException();
        }

        $this->email = $email;
    }
}
