<?php
//DAO Data Acess Objetct

class itemCompraDAO
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Obter todas as itemCompras da tabela
     */

    public function insert($item)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO tb_compra_produto (compra_id, produto_id, quantidade) VALUES (:compra_id, :produto_id, :quantidade)");

            $stmt->bindParam(':compra_id', $item->compra_id);
            $stmt->bindParam(':produto_id', $item->produto_id);
            $stmt->bindParam(':quantidade', $item->quantidade);


            $stmt->execute();

            // Retorne o item inserido ou qualquer outra informação necessária
            return $item;
        } catch (PDOException $e) {
        }
    }

}


?>