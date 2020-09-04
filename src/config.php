<?php

define('SITE_URL', 'http://localhost/agenda-contatos/');

// Config Databse
define("DB_DSN", "mysql:dbname=agenda;host=localhost");
define("DB_USER", "root");
define("DB_PWD", "");



require_once "lib/database.php";
require_once "lib/helper.php";


/** Faz o registro de uma função de autoload das classes utilizadas na aplicação */
spl_autoload_register(function ($nomeClasse) {
    $path_to_class = __DIR__ . '/classes/' . $nomeClasse . '.php';
    if (file_exists($path_to_class)) {
        require_once $path_to_class;
    } else {
        throw new Exception("Não foi possível carregar a classe: $nomeClasse");
    }
});
