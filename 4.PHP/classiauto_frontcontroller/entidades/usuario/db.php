<?php

class UsuarioDAO
{
  protected $conexao;

  public function __construct($conexao)
  {
    $this->conexao = $conexao;
  }

  /**
   * Consultar os usuários no banco de dados
   */

  function getAll()
  {
    $sql = "SELECT * FROM tb_usuario";

    #$result = $_conn->query($sql);
    return mysqli_query($this->conexao, $sql);
  }

  function insert($user)
  {
    $sql = "INSERT INTO tb_usuario (
    nome, 
    nascimento, 
    cidade, 
    uf,
    pais,
    email,
    telefone,
    senha) VALUES (
      '" . $user['nome'] . "',
      '" . $user['nascimento'] . "',
      '" . $user['cidade'] . "',
      '" . $user['uf'] . "',
      '" . $user['pais'] . "',
      '" . $user['email'] . "',
      '" . $user['telefone'] . "',
      '" . $user['senha'] . "'
    )";

    // Executando a query no DB
    //return $_conn->query($sql);
    return mysqli_query($this->conexao, $sql);
  }
}