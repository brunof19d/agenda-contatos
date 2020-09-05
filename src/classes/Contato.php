<?php

/**
 * Classe getters e setters do Contato
 * @param int $id
 * @param string $nome
 * @param string $email
 * @param string $telefone
 */
class Contato
{
    private int $id;
    private string $nome;
    private string $email;
    private string $telefone;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }
}
