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
use App\Models\TasksModel;

class TasksController extends AbstractController implements ControllerInterface
{

    private $tasksModel;

    public function __construct(array $parametros)
    {
        parent::__construct($parametros);

        $this->tasksModel = new TasksModel();
    }

    public function index()
    {
        $this->render('tasks.index');
    }
    
    public function tasksByUser()
    {
        $userId = $this->getParams('id');
        $this->tasksModel->returnAllTasksByUser($userId);
    }
    
    public function remove()
    {
        $taskId = $this->getParams('id');
        $this->tasksModel->removeTaskById($taskId);
    }
    
    public function novo()
    {
        $this->tasksModel->addTask();
    }
    
    public function edit()
    {
        $this->tasksModel->editTask();
    }
}
