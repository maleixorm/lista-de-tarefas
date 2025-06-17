<?php

class TaskService {
    private $conexao;
    private $tarefa;

    public function __construct(Conexao $conexao, Task $tarefa)
    {
        $this->conexao = $conexao->connect();
        $this->tarefa = $tarefa;
    }

    public function insert() 
    {
        $query = "INSERT INTO tb_tarefas(tarefa) VALUES(:tarefa)";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->execute();
    }

    public function select()
    {
        $query = "SELECT t.id, s.status, t.tarefa FROM tb_tarefas AS t LEFT JOIN tb_status AS s ON (t.id_status = s.id)";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function update() {
        $query = "UPDATE tb_tarefas SET tarefa = ? WHERE id = ?";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('tarefa'));
        $stmt->bindValue(2, $this->tarefa->__get('id'));
        return $stmt->execute();
    }

    public function remove() {
        $query = "DELETE FROM tb_tarefas WHERE id = ?";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('id'));
        $stmt->execute();
    }

    public function marcarRealizada() {
        $query = "UPDATE tb_tarefas SET id_status = ? WHERE id = ?";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('id_status'));
        $stmt->bindValue(2, $this->tarefa->__get('id'));
        return $stmt->execute();
    }
}