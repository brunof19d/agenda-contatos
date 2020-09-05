<?php

// Configuracao da onde está a URL do projeto.
define('SITE_URL', 'http://localhost/agenda-contatos/');

// Config Databse
define("DB_DSN", "mysql:dbname=agenda;host=localhost");
define("DB_USER", "root");
define("DB_PWD", "");

// Chamando as bibliotecas.
require_once "lib/database.php";
require_once "lib/helper.php";

// Habilita o uso de sessões na nossa aplicação.
if (!session_id()) {
    session_start();
}

// Faz o registro de uma função de autoload das classes utilizadas na aplicação.
spl_autoload_register(function ($nomeClasse) {

    $path_to_class = __DIR__ . '/classes/' . $nomeClasse . '.php';

    if (file_exists($path_to_class)) {
        require_once $path_to_class;
    } else {
        throw new Exception("Não foi possível carregar a classe: $nomeClasse");
    }

});

// Chamando nosso repositorio para fazer lidar com o banco de dados.
$repositorio_contatos = new AgendaRepository($pdo);
