<?php

require "./conn.php";
require "./tarefa.model.php";
require "./tarefa.service.php";

$tarefa = new Task();
$tarefa->__set('tarefa', $_POST['task']);

$conexao = new Conexao();

$tarefaService = new TaskService($conexao, $tarefa);
$tarefaService->insert();

header('Location: /lista-de-tarefas/public/nova_tarefa.php?inclusao=1');