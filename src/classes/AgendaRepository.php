<?php

class AgendaRepository
{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscar($contato_id = 0)
    {
        if ($contato_id > 0) {
            return $this->buscarUnicoContato($contato_id);
        } else {
            return $this->buscarTodosContatos();
        }
    }

    public function buscarUnicoContato($id)
    {
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'id' => $id,
        ]);

        $contato = $query->fetchObject('Contato');
        $contato->getId();

        return $contato;
    }

    public function buscarTodosContatos()
    {
        $sql = 'SELECT * FROM contatos';
        $resultado = $this->pdo->query($sql, PDO::FETCH_CLASS, 'Contato');

        $contatos = [];

        foreach ($resultado as $contato) {
            $contato->getId();
            $contatos[] = $contato;
        }

        return $contatos;
    }

    public function salvarContato(Contato $contato)
    {
        $sql = " INSERT INTO contatos (nome, email, telefone) VALUES (:nome, :email, :telefone)";

        $query = $this->pdo->prepare($sql);

        $query->execute([
            'nome'          => filter_var($contato->getNome(), FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES),
            'email'   => filter_var($contato->getEmail(), FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES),
            'telefone'      => $contato->getTelefone()
        ]);
    }

    public function atualizarContato(Contato $contato)
    {
        $sql = "UPDATE contatos SET
                    nome = :nome,
                    email = :email,
                    telefone = :telefone
                WHERE id = :id
        ";

        $query = $this->pdo->prepare($sql);

        $query->execute([
            'nome' => strip_tags($contato->getNome()),
            'email' => strip_tags($contato->getEmail()),
            'telefone' => $contato->getTelefone(),
            'id' => $contato->getId(),
        ]);
    }

    public function removerContato($id)
    {
        $sql = "DELETE FROM contatos WHERE id = :id";

        $query = $this->pdo->prepare($sql);

        $query->execute([
            'id' => $id,
        ]);
    }
}
