<?php
/**
 * @author Edson B S Monteiro <bruno.monteirodg@gmail.com>
 * 
 * LAUS DEO
 * 
 */
namespace App\Controllers;

use Core\Controller\AbstractController;
use Core\Interfaces\ControllerInterface;
use App\Models\AuthModel;

class AuthController extends AbstractController implements ControllerInterface
{

    private $authModel;

    public function __construct(array $parametros)
    {
        parent::__construct($parametros);

        $this->authModel = new AuthModel();
    }

    public function index()
    {
        // todo
    }

    public function login()
    {
        $this->authModel->login();
    }
}
