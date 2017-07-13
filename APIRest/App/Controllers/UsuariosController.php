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
use App\Models\UsuariosModel;

class UsuariosController extends AbstractController implements ControllerInterface
{

    private $usuariosModel;

    public function __construct(array $parametros)
    {
        parent::__construct($parametros);

        $this->usuariosModel = new UsuariosModel();
    }

    public function index()
    {
        // todo
    }

    public function novo()
    {
        $this->vw['usuarios'] = $this->usuariosModel->returnAllUsers();
        $this->render('home.login');
    }

    public function login()
    {
        $this->novo();
        $this->render('home.login');
    }
}
