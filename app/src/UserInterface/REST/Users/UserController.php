<?php
namespace App\UserInterface\REST\Users;

use App\Core\Components\UserManagement\Application\Write\Command\CreateUserCommand;
use App\Core\Components\UserManagement\Application\Write\Command\CreateUserCommandHandler;
use App\Core\Components\UserManagement\Application\Write\Exception\CannotRegisterUser;
use App\Core\Shared\Exception\InvalidArguments;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
    private CreateUserCommandHandler $commandHandler;

    public function __construct(
        CreateUserCommandHandler $commandHandler
    ) {
        $this->commandHandler = $commandHandler;
    }

    public function registerUser(Request $request)
    {
        try {
            $jsonBody = json_decode($request->getContent());

            $command = new CreateUserCommand($jsonBody->email, $jsonBody->password);
            $this->commandHandler->handle($command);

            return new Response(null,204);
        } catch (InvalidArguments $e) {
            return new Response($e->getMessage(), 400);
        } catch (CannotRegisterUser $e) {
            return new Response($e->getMessage(), 409);
        }
    }
}
