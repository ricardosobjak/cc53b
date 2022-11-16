<?php

class MarcaDAO
{
  private $conn;

  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  function getAll()
  {
    $sql = "SELECT * FROM tb_marca ORDER by nome";
    return $this->conn->query($sql);
  }
}
