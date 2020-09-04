<?php

class AgendaRepository extends PDO
{
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function salvarContato(Contato $contato)
    {
        $sql = " INSERT INTO agenda (nome, email, telefone) VALUES (:nome, :email, :telefone)";

        $query = $this->pdo->prepare($sql);

        $query->execute([
            'nome'          => strip_tags($contato->getNome()),
            'email'   => strip_tags($contato->getEmail()),
            'telefone'      => $contato->getTelefone()
        ]);
    }
}
