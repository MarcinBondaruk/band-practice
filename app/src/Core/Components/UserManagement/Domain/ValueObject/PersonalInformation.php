<?php
namespace App\Core\Components\UserManagement\Domain\ValueObject;

use App\Core\Shared\Exception\InvalidStringLength;

class PersonalInformation
{
    const MAX_NAME_LENGTH = 31;
    const MAX_LASTNAME_LENGTH = 31;

    private ?string $firstname;
    private ?string $lastname;

    public function __construct(
        ?string $firstname = null,
        ?string $lastname = null
    ) {
        $this->setFirstname($firstname);
        $this->setLastname($lastname);
    }

    /**
     * @return string|null
     */
    public function firstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @return string|null
     */
    public function lastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string|null $name
     * @throws InvalidStringLength
     */
    private function setFirstname(?string $name)
    {
        $nameLength = strlen($name);

        if ($nameLength > static::MAX_NAME_LENGTH || $nameLength < 0) {
            throw new InvalidStringLength();
        }

        $this->firstname = $name;
    }

    /**
     * @param string|null $lastName
     * @throws InvalidStringLength
     */
    private function setLastname(?string $lastName)
    {
        $lastNameLength = strlen($lastName);

        if ($lastNameLength > static::MAX_LASTNAME_LENGTH || $lastNameLength < 0) {
            throw new InvalidStringLength();
        }

        $this->lastname = $lastName;
    }
}
