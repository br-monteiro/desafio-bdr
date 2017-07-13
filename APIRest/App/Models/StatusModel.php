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

class StatusModel extends ModelAbstract
{

    private $header;
    private $entidade = 'status';

    public function __construct()
    {
        parent::__construct();

        $this->header = new Header();
    }


    public function returnAllStatus()
    {
        $stmt = $this->pdo()->prepare("SELECT * FROM {$this->entidade}");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $this->contentTypeJSON()->toJson($result);
    }
}
