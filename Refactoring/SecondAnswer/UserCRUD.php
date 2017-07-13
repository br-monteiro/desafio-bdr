<?php
/**
 * @author Edson B S Monteiro <bruno.monteirodg@gmail.com>
 * 
 * Model de User - CRUD
 * 
 * LAUS DEO
 */
namespace SecondAnswer;

use SecondAnswer\Database;

class UserCRUD extends Database
{

    protected $entity = 'user';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retorna todos os nomes de Usuarios ordenadamente
     * @return array Resultado da consulta
     */
    public function returnAllByName()
    {
        $sqlQuery = "SELECT name FROM {$this->entity} ORDER BY name ASC;";
        
        $result = $this->execute($sqlQuery);

        return $result;
    }
}
