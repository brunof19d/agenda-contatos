<?php

function get_url(string $page)
{
    return SITE_URL . $page;
}

function get_menu()
{
    return [
        'home' => array('Lista de Contatos', get_url('index.php')),
        'cadastrar' => array('Cadastrar Contato', get_url('src/templates/cadastrar.php'))
    ];
}

function set_mensagem(string $msg, string $classe, string $url = '', string $id = 'msg')
{

    $id = 'msg';

    $_SESSION[$id] = array(
        'mensagem' => $msg,
        'classe' => $classe
    );

    $url = $url ? $url : $_SERVER['REQUEST_URI'];

    header("Location: $url");
    exit();
}

function get_mensagem(string $id = 'msg')
{
    $msg = $_SESSION[$id] ?? null;
    unset($_SESSION[$id]);

    return $msg;
}

function formatoTelefone($telefone)
{
    return preg_replace('/(\d{2})(\d{4})(\d*)/', '($1) $2-$3', $telefone);
}

function tem_post()
{
    if (count($_POST) > 0) {
        return true;
    }

    return false;
}

function contains_number($string) {
    return is_numeric(filter_var($string, FILTER_SANITIZE_NUMBER_INT));
 }