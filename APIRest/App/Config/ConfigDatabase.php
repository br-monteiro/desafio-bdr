<?php
/**
 * @author Edson B S Monteiro <bruno.monteirodg@gmail.com>
 * 
 * LAUS DEO
 * 
 * Configuraçao das credenciais de conexao com o Banco de Dados
 */
namespace App\Config;

class ConfigDatabase
{

    public $db = array(
        'sgbd' => 'mysql',
        'server' => 'localhost',
        'dbname' => 'gerenciador_tarefa',
        'username' => 'webapp',
        'password' => 'webapp',
        'options' => array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"),
    );

}
