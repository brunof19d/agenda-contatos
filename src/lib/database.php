<?php

try {
    $pdo = new PDO(DB_DSN, DB_USER, DB_PWD);
} catch (PDOException $e) {
    echo 'Falha na conexão: ' . $e->getMessage();
}
