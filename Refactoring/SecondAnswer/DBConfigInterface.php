<?php
/**
 * @author Edson B S Monteiro <bruno.monteirodg@gmail.com>
 * 
 * Interface dos parametros de conexao com o Banco de Dados
 * 
 * LAUS DEO
 */
namespace SecondAnswer;

interface DBConfigInterface
{
    public function getSgbd();

    public function getServer();

    public function getDbname();

    public function getUsername();

    public function getPassword();

    public function getOptions();
}
