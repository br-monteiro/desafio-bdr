<?php
/**
 * @author Edson B S Monteiro <bruno.monteirodg@gmail.com>
 * 
 * Abstraçao do Bando de Dados e CRUD
 * 
 * LAUS DEO
 */
namespace SecondAnswer;

use SecondAnswer\DatabaseConfig;
use SecondAnswer\DatabaseConnection;

class Database
{
    protected $db;
    
    public function __construct()
    {
        $dbConfig = new DatabaseConfig();
        $this->db = new DatabaseConnection($dbConfig);
    }
    
    protected function execute($sqlQuery = null, array $values = array())
    {
        $stmt = $this->db->getConnection()->prepare($sqlQuery);
        $stmt->execute($values);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    /**********
     * OS METODOS ABAIXO FORAM CRIADOS APENAS PARA ILUSTRAR UMA CLASS DE CRUD
     */
    
    protected function findById($id)
    {
        // todo
    }
    
    protected function save()
    {
        // todo
    }
    
    protected function update($id)
    {
        // todo
    }
    
    protected function delete($id)
    {
        // todo
    }
    
    protected function listAll()
    {
        // todo
    }
}
