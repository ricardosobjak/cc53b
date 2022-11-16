<?php
class CategoriaDAO
{
  private $conn;

  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  function getAll()
  {
    $sql = "SELECT * FROM tb_categoria ORDER BY nome";
    return $this->conn->query($sql);
  }
}
