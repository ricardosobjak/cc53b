<?php


class PessoaDAO {
    private $pdo;

    function __construct($pdo) {
        $this->pdo = $pdo;
    }

    function insert($pessoa) {
        $sql = 'INSERT INTO tb_pessoa (
                nome, email, telefone, nascimento, login, senha)
            VALUES (:nome, :email, :telefone, :nascimento, :login, :senha)';
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $pessoa['nome']);
        $stmt->bindValue(':email', $pessoa['email']);
        $stmt->bindValue(':telefone', $pessoa['telefone']);
        $stmt->bindValue(':nascimento', $pessoa['nascimento']);
        $stmt->bindValue(':login', $pessoa['login']);
        $stmt->bindValue(':senha', $pessoa['senha']);

        return $stmt->execute();
    }

}
