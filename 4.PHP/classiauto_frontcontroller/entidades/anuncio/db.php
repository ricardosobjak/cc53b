<?php

class AnuncioDAO
{
  private $conn;

  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  function insert($anuncio)
  {
    print_r($anuncio);
    $sql = "INSERT
      INTO tb_anuncio (destaque, descricao, preco, id_categoria, id_marca, id_usuario) 
      VALUES (
        '" . $anuncio['destaque'] . "',
        '" . $anuncio['descricao'] . "', "
      . $anuncio['preco'] . ", "
      . $anuncio['categoria'] . ", "
      . $anuncio['marca'] . ", "
      . $anuncio['user_id']
      . ")";

      echo $sql;

    return $this->conn->query($sql);
  }

  function update($anuncio)
  {
    print_r($anuncio);
    $sql = "UPDATE tb_anuncio SET destaque = '" . $anuncio['destaque'] . "', 
      descricao = '" . $anuncio['descricao'] . "', 
      preco = " . $anuncio['preco'] . ", 
      id_categoria = " . $anuncio['categoria'] . ", 
      id_marca = " . $anuncio['marca'] . "
      WHERE id = " . $anuncio['id'];

    return $this->conn->query($sql);
  }


  /**
   * Consultar os anúncios no banco de dados
   */
  function getAll($categoria = null)
  {
    $sql = "SELECT 
          tb_anuncio.id,
          tb_anuncio.descricao, 
          tb_anuncio.destaque,
          tb_anuncio.preco,
          tb_categoria.nome AS categoria,
          tb_marca.nome AS marca,
          tb_usuario.nome,
          tb_usuario.telefone
        FROM 
          tb_anuncio
        INNER JOIN tb_usuario
          ON tb_anuncio.id_usuario = tb_usuario.id
        INNER JOIN tb_categoria
          ON tb_anuncio.id_categoria = tb_categoria.id
        INNER JOIN tb_marca
          ON tb_anuncio.id_marca = tb_marca.id";

    $sql .= $categoria ? ' WHERE id_categoria = ' . $categoria : '';

    #$result = $_conn->query($sql);
    return mysqli_query($this->conn, $sql);
  }


  /**
   * Consultar um anúncio no banco de dados
   */
  function getById($id)
  {
    $sql = "SELECT 
          tb_anuncio.id,
          tb_anuncio.descricao, 
          tb_anuncio.destaque,
          tb_anuncio.preco,
          tb_categoria.id AS categoria_id,
          tb_categoria.nome AS categoria,
          tb_marca.id AS marca_id,
          tb_marca.nome AS marca,
          tb_usuario.nome,
          tb_usuario.telefone
        FROM 
          tb_anuncio
        INNER JOIN tb_usuario
          ON tb_anuncio.id_usuario = tb_usuario.id
        INNER JOIN tb_categoria
          ON tb_anuncio.id_categoria = tb_categoria.id
        INNER JOIN tb_marca
          ON tb_anuncio.id_marca = tb_marca.id
        WHERE tb_anuncio.id = " . $id;

    #$result = $_conn->query($sql);
    return mysqli_query($this->conn, $sql);
  }


  /**
   * Deletar um anúncio
   */
  function delete($id)
  {
    $sql = "DELETE FROM tb_anuncio WHERE id = " . $id;

    #$result = $_conn->query($sql);
    return mysqli_query($this->conn, $sql);
  }
}
