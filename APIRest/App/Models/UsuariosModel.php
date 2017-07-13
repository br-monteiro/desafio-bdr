<?php
/**
 * @author Edson B S Monteiro <bruno.monteirodg@gmail.com>
 * 
 * LAUS DEO
 * 
 * Model de Usuarios
 */
namespace App\Models;

use Core\Database\ModelAbstract;
use Core\Http\Header;

class UsuariosModel extends ModelAbstract
{

    private $header;
    private $entidade = 'users';

    public function __construct()
    {
        parent::__construct();

        $this->header = new Header();
    }


    public function returnAllUsers()
    {
        $stmt = $this->pdo()->prepare("SELECT * FROM {$this->entidade}");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
