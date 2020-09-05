<?php
// Chamando funcao que mostra mensagem de erros
$msg = get_mensagem();
// Chamando nosso repositorio(AgendaRepository) com a funcao buscar com um GET ID
$contato = $repositorio_contatos->buscar($_GET['id']);

// Verifica e lida com o POST do formulario
try {
    if (tem_post()) {
        $contato_id = $_POST['contato_id'];

        if (array_key_exists('nome_contato', $_POST) && filter_var($_POST['nome_contato'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES)) {
            $contato->setNome($_POST['nome_contato']);
        } else {
            throw new Exception("Nome é obrigatório!");
        }

        if (array_key_exists('email_contato', $_POST)  && filter_var($_POST['email_contato'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES)) {
            $contato->setEmail($_POST['email_contato']);
        } else {
            throw new Exception("E-mail é obrigatório!");
        }

        if (array_key_exists('tel_contato', $_POST) && filter_var($_POST['tel_contato'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES)) {

            if (contem_numero($_POST['tel_contato']) && strlen($_POST['tel_contato']) == 11) {
                $contato->setTelefone($_POST['tel_contato']);
            } else {
                throw new Exception("Telefone precisa conter 9 numeros.");
            }
        } else {
            throw new Exception("Telefone é obrigatório!");
        }

        $repositorio_contatos->atualizarContato($contato);
        set_mensagem('Contato editado com sucesso', 'alert-success', 'home.php');
    }
} catch (\Throwable $e) {
    set_mensagem($e->getMessage(), 'alert-danger');
}
