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
use App\Models\StatusModel;

class StatusController extends AbstractController implements ControllerInterface
{

    private $statusModel;

    public function __construct(array $parametros)
    {
        parent::__construct($parametros);

        $this->statusModel = new StatusModel();
    }

    public function index()
    {
        $this->listAll();
    }
    
    public function listAll()
    {
        $this->statusModel->returnAllStatus();
    }
}
