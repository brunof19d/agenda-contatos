<?php

// Conexao com o banco de dados, definir as contatos no arquivo config.php
try {
    $pdo = new PDO(DB_DSN, DB_USER, DB_PWD);
} catch (PDOException $e) {
    echo 'Falha na conexão: ' . $e->getMessage();
}
