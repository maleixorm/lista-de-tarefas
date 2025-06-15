<?php

class Task {
    private $id;
    private $id_status;
    private $tarefa;
    private $data_cadastro;

    public function __construct($id, $id_status, $tarefa, $data_cadastro)
    {
        
    }

    public function __get($attribute) {
        return $this->$attribute;
    }

    public function __set($attribute, $value) {
        $this->$attribute = $value;
    }
}