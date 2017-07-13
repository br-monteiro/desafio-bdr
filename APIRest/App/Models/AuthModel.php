<?php
/**
 * @author Edson B S Monteiro <bruno.monteirodg@gmail.com>
 * 
 * LAUS DEO
 * 
 * Model de Auth
 */
namespace App\Models;

use Core\Database\ModelAbstract;
use App\Helpers\SessionHelper;
use App\Config\ConfigApp as cfg;

class AuthModel extends ModelAbstract
{

    private $session;

    public function __construct()
    {
        parent::__construct();
        $this->session = new SessionHelper();
    }

    public function login()
    {
        $userId = filter_input(INPUT_POST, 'user');

        if ($userId) {
            $this->session->play();
            $_SESSION['udi'] = $userId;
            echo '<meta http-equiv="refresh" content="0;URL=' . cfg::PREFIX_ROUTE . "/tasks" . '" />'
            . '<script>window.location = "' . cfg::PREFIX_ROUTE . "/tasks" . '"; </script>';
            return true; // stop script
        }
    }
}
