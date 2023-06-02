<?php
class User
{
    function __construct($nome, $nascimento, $telefone, $email, $login, $senha)
    {
        $this->nome = $nome;
        $this->nascimento = $nascimento;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->login = $login;
        $this->senha = $senha;
    }
}
