<?php
/**
 * @author Edson B S Monteiro <bruno.monteirodg@gmail.com>
 * 
 * LAUS DEO
 * 
 * Helper de Sessao
 */
namespace App\Helpers;

class SessionHelper
{
    public function play()
    {
        if (!isset($_SESSION)) {
            return true;
        }
        
        session_start();
        session_regenerate_id(true);
    }
    
    public function stop()
    {
        $this->play();
        session_destroy();
    }
}
