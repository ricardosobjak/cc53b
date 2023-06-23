<?php
//DAO Data Acess Objetct

class usuarioDAO
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Obter todas as usuarios da tabela
     */

    public function getAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tb_usuario");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);

    }

    /*
     * Inserir uma usuario no banco de dados
     */

    public function insert($usuario)
    {
        $stmt = $this->pdo->prepare("INSERT INTO tb_usuario (nome,email,senha,nascimento,adm) 
        VALUES (:nome,:email,:senha,:nascimento,:adm)");

        $stmt->bindValue("nome", $usuario->nome);
        $stmt->bindValue("email", $usuario->email);
        $stmt->bindValue("senha", $usuario->senha);
        $stmt->bindValue("nascimento", $usuario->nascimento);
        $stmt->bindValue("adm", $usuario->adm);

        $stmt->execute();
        $usuario = clone $usuario; //nunca se mexe diretamente no que é enviado, primeiro se clona a info em caso de imprevistos
        $usuario->id = $this->pdo->lastInsertId();
        return $usuario;

    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM tb_usuario WHERE id=:id"); //sempre colocar a where se não apaga tudo
        $stmt->bindValue("id", $id);

        $stmt->execute();
        // Retorna a qdt de linhas afetadas
        return $stmt->rowCount();
    }

    public function update($id, $usuario)
    {
        $stmt = $this->pdo->prepare("UPDATE tb_usuario SET nome = :nome, email = :email, senha = :senha, nascimento = :nascimento, adm = :adm WHERE id = :id");

        $data = [
            "id"=> $id,
            "nome" => $usuario->nome,
            "email" => $usuario->email,
            "senha" => $usuario->senha,
            "nascimento" => $usuario->nascimento,
            "adm" => $usuario->adm
        ];

        return $stmt->execute($data);

    }

}


?>