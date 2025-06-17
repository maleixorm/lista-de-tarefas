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
} elseif ($acao == 'recuperar') {
    $tarefa = new Task();
    $conexao = new Conexao();

    $tarefaService = new TaskService($conexao, $tarefa);
    $tarefas = $tarefaService->select();
} elseif ($acao == 'atualizar') {
    $tarefa = new Task();
    $tarefa->__set('id', $_POST['id']);
    $tarefa->__set('tarefa', $_POST['tarefa']);

    $conexao = new Conexao();

    $tarefaService = new TaskService($conexao, $tarefa);
    $atualizar = $tarefaService->update();
    if ($atualizar) {
        if (isset($_GET['pag']) && $_GET['pag'] == 'index') {
            header('location: /lista-de-tarefas/public/index.php');
        } else {
            header('location: /lista-de-tarefas/public/todas_tarefas.php?edicao=1');
        } 
    }
} elseif ($acao == 'remover') {
    $tarefa = new Task();
    $tarefa->__set('id', $_GET['id']);

    $conexao = new Conexao();

    $tarefaService = new TaskService($conexao, $tarefa);
    $tarefaService->remove();

    if (isset($_GET['pag']) && $_GET['pag'] == 'index') {
        header('location: /lista-de-tarefas/public/index.php');
    } else {
        header('location: /lista-de-tarefas/public/todas_tarefas.php?remocao=1');
    }
} elseif ($acao == 'marcarRealizada') {
    $tarefa = new Task();
    $tarefa->__set('id', $_GET['id']);
    $tarefa->__set('id_status', 2);

    $conexao = new Conexao();

    $tarefaService = new TaskService($conexao, $tarefa);
    $tarefaService->marcarRealizada();

    if (isset($_GET['pag']) && $_GET['pag'] == 'index') {
        header('location: /lista-de-tarefas/public/index.php');
    } else {
        header('location: /lista-de-tarefas/public/todas_tarefas.php');
    }
} elseif ($acao == 'recuperarTarefasPendentes') {
    $tarefa = new Task();
    $tarefa->__set('id_status', 1);
    $conexao = new Conexao();

    $tarefaService = new TaskService($conexao, $tarefa);
    $tarefas = $tarefaService->selectPendingTask();
}
