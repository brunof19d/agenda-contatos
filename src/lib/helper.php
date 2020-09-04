<?php 

function get_url(string $page)
{
    return SITE_URL . $page;
}

function get_menu()
{
    return array(
        'home' => array('Lista de Contatos', get_url('admin/index.php')),
        'contatos' => array('Contatos', get_url('admin/contatos')),
        'depoimentos' => array('Depoimentos', get_url('admin/depoimentos')),
        'newsletter' => array('Newsletter', get_url('admin/newsletter')),
        'portfolio' => array('Portfolio', get_url('admin/portfolio')),
        'servicos' => array('Serviços', get_url('admin/servicos')),
        'time' => array('Time', get_url('admin/time')),
        'usuarios' => array('Usuários', get_url('admin/usuarios')),
    );
}