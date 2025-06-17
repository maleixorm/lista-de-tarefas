function editar(id, txt_tarefa) {
    let form = document.createElement('form');
    form.action = '/lista-de-tarefas/tarefa.controller.php?acao=atualizar';
    form.method = 'post';
    form.className = 'row';

    let inputTask = document.createElement('input');
    inputTask.type = 'text';
    inputTask.name = 'tarefa';
    inputTask.className = 'form-control col-sm-9';
    inputTask.value = txt_tarefa;

    let inputId = document.createElement('input');
    inputId.type = 'hidden';
    inputId.name = 'id';
    inputId.value = id;

    let button = document.createElement('button');
    button.type = 'submit';
    button.className = 'btn btn-info col-sm-3';
    button.innerHTML = 'Atualizar';

    form.appendChild(inputTask);
    form.appendChild(inputId);
    form.appendChild(button);

    let tarefa = document.getElementById('tarefa_'+id);
    tarefa.innerHTML = '';
    tarefa.insertBefore(form, tarefa[0]);
}

function remover(id) {
    location.href = 'todas_tarefas.php?acao=remover&id='+id;
}

function marcarRealizada(id) {
    location.href = 'todas_tarefas.php?acao=marcarRealizada&id='+id;
}