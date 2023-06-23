<?php
//DAO Data Acess Objetct

class produtoCategoriaDAO
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Obter todas as produtoCompras da tabela
     */

    public function insert($item)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO tb_produto_categoria (categoria_id, produto_id) VALUES (:categoria_id, :produto_id)");

            $stmt->bindParam(':categoria_id', $item->categoria_id);
            $stmt->bindParam(':produto_id', $item->produto_id);

            $stmt->execute();
            $item = clone $item; //nunca se mexe diretamente no que é enviado, primeiro se clona a info em caso de imprevistos
            $item->id = $this->pdo->lastInsertId();
            // Retorne o item inserido ou qualquer outra informação necessária
            return $item;
        } catch (PDOException $e) {
        }
    }

}
?>