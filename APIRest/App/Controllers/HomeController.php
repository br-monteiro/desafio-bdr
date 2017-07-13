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

class HomeController extends AbstractController implements ControllerInterface
{

    public function __construct(array $parametros)
    {
        parent::__construct($parametros);
    }

    public function index()
    {
        $this->render('home.index');
    }

}
