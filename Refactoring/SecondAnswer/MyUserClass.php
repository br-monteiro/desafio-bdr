<?php
/**
 * @author Edson B S Monteiro <bruno.monteirodg@gmail.com>
 * 
 * Segunda resposta da prova tecnica
 * 
 * LAUS DEO
 */
namespace SecondAnswer;

use SecondAnswer\UserCRUD;

class MyUserClass
{
    private $crud;
    
    public function __construct()
    {
        $this->crud = new UserCRUD();
    }

    public function getUserList()
    {
        return $this->crud->returnAllByName();
    }
}
