<?php
/**
 * @author Edson B S Monteiro <bruno.monteirodg@gmail.com>
 * 
 * Complemento da Segunda resposta da prova tecnica
 * Classe de Conexao com o Banco de Dados
 * 
 * LAUS DEO
 */
namespace SecondAnswer;

use SecondAnswer\DBConfigInterface;

class DatabaseConnection
{

    private static $connection;
    private $config;

    public function __construct(DBConfigInterface $config)
    {
        $this->config = $config;
        $this->connect();
    }

    /**
     * Conecta ao Banco de Dados
     * @return boolean
     */
    private function connect()
    {
        // se ja houver uma conexao instanciada, entao reaproveite-a
        if (self::$connection) {
            return true;
        }

        try {
            self::$connection = new \PDO(
                $this->config->getSgbd()
                . ':host=' . $this->config->getServer()
                . ';dbname=' . $this->config->getDbname(), $this->config->getUsername(), $this->config->getPassword(), $this->config->getOptions()
            );

            self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getConnection()
    {
        return self::$connection;
    }
}
