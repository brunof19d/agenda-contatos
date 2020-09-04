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
