<?php

require "conn.php";
require "tarefa.model.php";
require "tarefa.service.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if ($acao == 'inserir') {
    $tarefa = new Task();
    $tarefa->__set('tarefa', $_POST['tarefa']);

    $conexao = new Conexao();

    $tarefaService = new TaskService($conexao, $tarefa);
    $tarefaService->insert();

    header('Location: /lista-de-tarefas/public/nova_tarefa.php?inclusao=1');
} else if ($acao == 'recuperar') {
    $tarefa = new Task();
    $conexao = new Conexao();

    $tarefaService = new TaskService($conexao, $tarefa);
    $tarefas = $tarefaService->select();
} else if ($acao == 'atualizar') {
    $tarefa = new Task();
    $tarefa->__set('id', $_POST['id']);
    $tarefa->__set('tarefa', $_POST['tarefa']);

    $conexao = new Conexao();

    $tarefaService = new TaskService($conexao, $tarefa);
    $atualizar = $tarefaService->update();
    if ($atualizar) {
        header('location: /lista-de-tarefas/public/todas_tarefas.php?edicao=1');
    }
}
