<?php
// Controlador da entidade "Usuário"
require '../../config.php';
require './db.php';

$userdb = new UsuarioDAO($_conn);

/**
 * Validar os campos do formulário
 */
function formValido($arr)
{
  return !empty($arr['nome'])
    && !empty($arr['telefone'])
    && !empty($arr['email'])
    && !empty($arr['senha'])
    && ($arr['senha'] == $arr['senha2']);
}

$action = isset($_REQUEST['action'])
  ? $_REQUEST['action'] : null;

$view = 'view/list.php'; // View default = listagem de usuários
$hasErros = false;

if ($action == "novo") {
  $view = 'view/form.php'; // Incluindo a view de cadastro
} else if ($action == "editar") {
  $view = 'view/form.php'; // Incluindo a view de edição
} else if ($action == "salvar") {

  if (!formValido($_POST)) {
    $usuario = $_POST;
    $hasErros = true;
    $view = 'view/form.php'; // Incluindo a view de edição
  } else {
    // Executando a query no DB
    if ($result = $userdb->insert($_POST)) {
      $message = "Usuário salvo com sucesso";
      $result = $userdb->getAll();

      // Mostra a lista de usuários cadastrados
      $view = 'view/list.php'; // Incluindo a view de cadastro
    } else {
      $message = "Falha ao salvar usuário";
      var_dump($result);
      $view = 'view/form.php'; // Incluindo a view de edição
    }
  }
} else {
  $result = $userdb->getAll();
}

include "../../template/index.php";