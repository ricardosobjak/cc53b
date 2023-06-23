<?php
//DAO Data Acess Objetct

class produtoDAO
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Obter todas as produtos da tabela
     */

    public function getAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tb_produto");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);

    }

    /*
     * Inserir uma produto no banco de dados
     */

    public function insert($produto)
    {
        $stmt = $this->pdo->prepare("INSERT INTO tb_produto (nome,descricao,preco,quantidade) 
        VALUES (:nome,:descricao,:preco,:quantidade)");

        $stmt->bindValue("nome", $produto->nome);
        $stmt->bindValue("descricao", $produto->descricao);
        $stmt->bindValue("preco", $produto->preco);
        $stmt->bindValue("quantidade", $produto->quantidade);
      


        $stmt->execute();
        $produto = clone $produto; //nunca se mexe diretamente no que é enviado, primeiro se clona a info em caso de imprevistos
        $produto->id = $this->pdo->lastInsertId();
        return $produto;

    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM tb_produto WHERE id=:id"); //sempre colocar a where se não apaga tudo
        $stmt->bindValue("id", $id);

        $stmt->execute();
        // Retorna a qdt de linhas afetadas
        return $stmt->rowCount();
    }

    public function update($id, $produto)
    {
        $stmt = $this->pdo->prepare("UPDATE tb_produto SET nome = :nome, descricao = :descricao, preco = :preco, quantidade = :quantidade WHERE id = :id");

        $data = [
            "id" => $id,
            "nome" => $produto->nome,
            "descricao" => $produto->descricao,
            "preco" => $produto->preco,
            "quantidade" => $produto->quantidade,
            
        ];

        return $stmt->execute($data);

    }

}


?>