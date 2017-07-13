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

class TasksModel extends ModelAbstract
{

    private $header;
    private $entidade = 'tasks';

    public function __construct()
    {
        parent::__construct();

        $this->header = new Header();
    }

    public function returnAllTasksByUser($userId)
    {
        $stmt = $this->pdo()->prepare("SELECT tsk.*, st.color, st.nome AS status_nome, st.icon "
            . " FROM {$this->entidade} AS tsk "
            . " INNER JOIN status AS st ON st.id = tsk.status_id "
            . " WHERE users_id = ? "
            . " ORDER BY tsk.status_id, tsk.priority ASC");
        $stmt->execute(array($userId));
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $this->contentTypeJSON()->toJson($result);
    }

    public function returnAllTasks()
    {
        $stmt = $this->pdo()->prepare("SELECT tsk.*, st.color, st.nome AS status_nome, st.icon "
            . " FROM {$this->entidade} AS tsk "
            . " INNER JOIN status AS st ON st.id = tsk.status_id "
            . " ORDER BY tsk.status_id, tsk.priority ASC");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $this->contentTypeJSON()->toJson($result);
    }

    public function removeTaskById($userId)
    {
        $stmt = $this->pdo()->prepare("DELETE FROM  {$this->entidade} WHERE id = ? ");
        if ($stmt->execute(array($userId))) {
            $this->header->setHttpHeader(200);
            return true;
        }

        $this->header->setHttpHeader(500);
        $this->contentTypeJSON()->toJson(array('text' => 'Houve um erro ao deletar o registro'));
    }

    public function addTask()
    {
        $dados = $this->validaDados();

        $stmt = $this->pdo()->prepare("INSERT INTO {$this->entidade} (`id`, `title`, `description`, `priority`, `created_at`, `users_id`, `status_id`) "
            . "VALUES (:id, :title, :description, :priority, " . time() . ", :users_id, :status_id);");
        if ($stmt->execute($dados)) {
            $this->header->setHttpHeader(200);
            return true;
        }

        $this->header->setHttpHeader(203);
        $this->contentTypeJSON()->toJson(array('text' => 'Não foi possível adicionar a tarefa'));
    }

    public function editTask()
    {
        $dados = $this->validaDados();

        unset($dados[':created_at'], $dados[':users_id']);

        $stmt = $this->pdo()->prepare("UPDATE {$this->entidade} SET "
            . " title = :title, "
            . " description = :description, "
            . " priority = :priority, "
            . " status_id = :status_id "
            . " WHERE id = :id ");
        if ($stmt->execute($dados)) {
            $this->header->setHttpHeader(200);
            return true;
        }

        $this->header->setHttpHeader(203);
        $this->contentTypeJSON()->toJson(array('text' => 'Não foi possível alterar a tarefa'));
    }

    private function validaDados()
    {
        $dado = $this->getInput();

        if (!isset($dado['title'])) {
            $this->header->setHttpHeader(203);
            $this->contentTypeJSON()->toJson(array('text' => 'O ocampo título deve ser preenchido corretamente'));
            exit;
        }

        if (!isset($dado['description'])) {
            $this->header->setHttpHeader(203);
            $this->contentTypeJSON()->toJson(array('text' => 'O campo descrição deve ser preenchido corretamente'));
            exit;
        }

        if (!isset($dado['status_id'])) {
            $this->header->setHttpHeader(203);
            $this->contentTypeJSON()->toJson(array('text' => 'O campo status deve ser preenchido corretamente'));
            exit;
        }

        if (!isset($dado['priority'])) {
            $this->header->setHttpHeader(203);
            $this->contentTypeJSON()->toJson(array('text' => 'O campo prioridade deve ser preenchido corretamente'));
            exit;
        }

        if (!isset($dado['users_id'])) {
            $this->header->setHttpHeader(203);
            $this->contentTypeJSON()->toJson(array('text' => 'Usuário não identificado'));
            exit;
        }

        return array(
            ':id' => isset($dado['id']) ? $dado['id'] : null,
            ':title' => $dado['title'],
            ':description' => $dado['description'],
            ':status_id' => $dado['status_id'],
            ':priority' => $dado['priority'],
            ':users_id' => $dado['users_id'],
        );
    }
}
