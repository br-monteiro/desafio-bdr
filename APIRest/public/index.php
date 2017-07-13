<?php
/**
 * Projeto API Rest de Um gerenciador de tarefas - Desafio BDR
 * @author Edson B S MOnteiro <bruno.monteirodg@gmail.com>
 * @version 0.0.1
 * 
 * LAUS DEO
 */
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

// modificanco o separador de diretorio
define('DS', DIRECTORY_SEPARATOR);
// incluindo o autoload do composer
require_once '..' . DS . 'vendor' . DS . 'autoload.php';

try {
    
    $app = new \Core\Bootstrap\InitApp();
    $app->run();
    
} catch (Exception $ex) {
    echo $ex->getMessage();
}
