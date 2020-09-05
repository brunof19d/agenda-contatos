<?php

/**
 * Retorna a URL 
 * @param string $page
 * @return string
 */
function get_url(string $page)
{
    return SITE_URL . $page;
}

/**
 * Funcao que lida com o redirecionamento do menu de nav.
 * @return array|array
 */
function get_menu()
{
    return [
        'home' => array('Lista de Contatos', get_url('index.php')),
        'cadastrar' => array('Cadastrar Contato', get_url('src/templates/cadastrar.php'))
    ];
}

/**
 * Configura a mensagem de erro ou de sucesso a ser exibida pela aplicação
 * @param string $msg       Mensagem a ser exibida pela aplicação
 * @param string $classe    Classe CSS(Bootstrap) a ser aplicada no elemento HTML da mensagem
 * @param string $url       URL de redirecionamento (Por padrão redireciona para a página atual)
 * @param string $id        ID da mensagem na Sessão
 * @return void
 */
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
/**
 * Retorna a mensagem guardada na sessão da aplicação
 * @param string $id    ID da chave na Sessão que contém a mensagem
 * @return array|null
 */
function get_mensagem(string $id = 'msg')
{
    $msg = $_SESSION[$id] ?? null;
    unset($_SESSION[$id]);

    return $msg;
}

/**
 * Funcao que trata o input telefone do usuario
 * @return string|string|array|null
 */
function formatoTelefone($telefone)
{
    return preg_replace('/(\d{2})(\d{5})(\d*)/', '($1) $2-$3', $telefone);
}

/**
 * Funcao que verifica se tem POST
 * @return bool
 */
function tem_post()
{
    if (count($_POST) > 0) {
        return true;
    }

    return false;
}

/**
 * Funcao que verifica se tem numero na string
 * @param mixed $string
 * @return bool
 */
function contem_numero($string) {
    return is_numeric(filter_var($string, FILTER_SANITIZE_NUMBER_INT));
 }