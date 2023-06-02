<?php

/**
 *  Controlador da entidade "Anúncio"
 */

// Importa as configurações básicas/comuns da aplicação
require '../../config.php';

// Verifica se a sessão é válida
if (!sessionValid()) exit;

// Incluir as dependências para este controlador
require './db.php'; // Funções de persistência do anúncio
require '../categoria/db.php'; // Funções de persistência de categoria
require '../marca/db.php'; // Funções de persistência de marca

$marcaDAO = new MarcaDAO($_conn);
$categoriaDAO = new CategoriaDAO($_conn);
$anuncioDAO = new AnuncioDAO($_conn);


/**
 * Validar os campos do formulário
 */
function formValido($arr)
{
  return !empty($arr['destaque'])
    && !empty($arr['descricao'])
    && !empty($arr['categoria'])
    && !empty($arr['marca']);
}

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;

$view = 'view/list.php'; // Incluindo a view de listagem (default)

$hasErros = false;

// Ação para cadastrar um novo anúncio (abrir a view form.php)
// ou Ação para editar um anúncio (abrir a view form.php)
if ($action == "novo" || $action == "editar") {
  $categorias = $categoriaDAO->getAll();
  $marcas = $marcaDAO->getAll();
  $view = 'view/form.php'; // Incluindo a view de cadastro

  if ($action == "editar") {
    if ($result = $anuncioDAO->getById($_REQUEST['id']))
      $anuncio = $result->fetch_array();
  }
}
// Ação para salvar um anúncio
else if ($action == "salvar") {
  $anuncio = $_POST;

  // Valida o formulário
  if (!formValido($_POST)) { // Não passou na validação
    $hasErros = true;
    $view = 'view/form.php';
  } else { // Formulário está válido

    // Setando o ID do usuário
    $anuncio["user_id"] = $_SESSION['classiauto_user_id'];

    $result = (array_key_exists("id", $anuncio) && $anuncio['id'] > 0)
      ? $anuncioDAO->update($anuncio)
      : $anuncioDAO->insert($anuncio);

    // Executando a query no DB
    if ($result) {
      $result = $anuncioDAO->getAll();
    } else {
      print_r($_conn);
      echo "Falha ao salvar anúncio";
      $view = 'view/form.php'; // Incluindo a view de cadastro
    }
  }
}
// Excluir Anúncio
else if ($action == "excluir") {
  if (isset($_POST['id']))
    $anuncioDAO->delete($_POST['id']);
}

// Se nenhuma ação for especificada, então mostra a listagem 
if (!isset($view) || $view == 'view/list.php') {
  $result = $anuncioDAO->getAll();
}

include "../../template/index.php";
