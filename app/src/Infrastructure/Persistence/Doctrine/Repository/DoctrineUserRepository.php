<?php
namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Core\Components\UserManagement\Application\Write\Repository\UserRepository;
use App\Core\Components\UserManagement\Domain\Entity\User;
use App\Infrastructure\Persistence\Doctrine\Mappings\User\ORMUser;
use App\Infrastructure\Utils\ReflectionService;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineUserRepository implements UserRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager
    ) {
        $this->entityManager = $entityManager;
    }

    public function create(User $user): void
    {
        $ormUser = ReflectionService::createObject(ORMUser::class, [
            'email' => $user->email(),
            'passwordHash' => $user->passwordHash(),
            'firstname' => $user->personalInformation()->firstname(),
            'lastname' => $user->personalInformation()->lastname()
        ]);

        $this->entityManager->persist($ormUser);
        $this->entityManager->flush();
    }

    public function doesUserExist(string $email): bool
    {
        $ormUser = $this->entityManager->getRepository(ORMUser::class)
            ->findBy(['email' => $email]);

        return !empty($ormUser);
    }
}
