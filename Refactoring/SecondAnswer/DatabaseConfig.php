<?php
/**
 * @author Edson B S Monteiro <bruno.monteirodg@gmail.com>
 * 
 * Complemento da Segunda resposta da prova tecnica
 * Configuraçao dos parametros de conexao com o Banco de Dados
 * 
 * LAUS DEO
 */
namespace SecondAnswer;

use SecondAnswer\DBConfigInterface;

class DatabaseConfig implements DBConfigInterface
{
    // parametros de configuraçao da conexao
    private $sgbd = 'mysql';
    private $server = 'localhost';
    private $dbname = 'database';
    private $username = 'user';
    private $password = 'password';
    private $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
    );

    public function getSgbd()
    {
        return $this->sgbd;
    }

    public function getServer()
    {
        return $this->server;
    }

    public function getDbname()
    {
        return $this->dbname;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getOptions()
    {
        return $this->options;
    }
}
