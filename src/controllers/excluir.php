<?php

$msg = get_mensagem();
$contato = $repositorio_contatos = new AgendaRepository($pdo);


try {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if ($id === false or $id <= 0) {
        throw new Exception('ID de exclusão fornecido é inválido!');
    }

    $contato->removerContato($_GET['id']);
    set_mensagem('Depoimento excluído com sucesso!', 'alert-success', 'home.php');
} catch (\Throwable $e) {
    set_mensagem($e->getMessage(), 'alert-danger', 'home.php');
}
