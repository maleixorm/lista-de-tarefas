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

    public function select() {

    }

    public function update() {

    }

    public function remove() {

    }
}