<?php
// Chamando funcao que mostra mensagem de erros.
$msg = get_mensagem();
// Chamando nossa clase Repository
$contato = $repositorio_contatos = new AgendaRepository($pdo);

// Verifica e lida com a exclusao do contato, não deixando ele colocar uma letra ou um numero invalido na URL.
try {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if ($id === false or $id <= 0) {
        throw new Exception('ID de exclusão fornecido é inválido!');
    }

    $contato->removerContato($_GET['id']);
    set_mensagem('Contato excluído com sucesso!', 'alert-success', 'home.php');
} catch (\Throwable $e) {
    set_mensagem($e->getMessage(), 'alert-danger', 'home.php');
}
