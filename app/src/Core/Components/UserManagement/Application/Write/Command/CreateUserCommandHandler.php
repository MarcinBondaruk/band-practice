<?php
namespace App\Core\Components\UserManagement\Application\Write\Command;

use App\Core\Components\UserManagement\Application\Write\Exception\CannotRegisterUser;
use App\Core\Components\UserManagement\Application\Write\Repository\UserRepository;
use App\Core\Components\UserManagement\Domain\Entity\User;
use App\Core\Components\UserManagement\Domain\ValueObject\PersonalInformation;
use App\Core\Ports\PasswordHashGenerator;

class CreateUserCommandHandler
{
    private PasswordHashGenerator $passwordHashGenerator;
    private UserRepository $userRepository;

    public function __construct(
        PasswordHashGenerator $passwordHashGenerator,
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
        $this->passwordHashGenerator = $passwordHashGenerator;
    }

    public function handle(CreateUserCommand $command)
    {
        if ($this->userRepository->doesUserExist($command->email())) {
            throw new CannotRegisterUser('email_in_use');
        }

        $user = new User(
            $command->email(),
            $this->passwordHashGenerator->getPasswordHash($command->password()),
            new PersonalInformation()
        );

        $this->userRepository->create($user);
    }
}
