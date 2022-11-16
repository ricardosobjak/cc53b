<?php

/**
 * CONTROLLER: Login
 */

require '../config.php';
//require './db.php';

/**
 * Validar os campos do formulário
 */
function formValido($arr)
{
	return !empty($arr['usuario']) && !empty($arr['senha']);
}

$action = isset($_REQUEST['action'])
	? $_REQUEST['action'] : null;

if ($action == "logout") {
	session_destroy();

	Header("Location: " . webroot());
	exit;
}
// Validar o Login
else if ($action == "validar") {
	$usuario = trim($_POST["usuario"]);
	$senha = trim($_POST["senha"]);


	if (!formValido($_POST)) { // Faz a validação de campos obrigatórios
		$anuncio = $_POST;
		$hasErros = true;

		$message = "Usuário e/ou senha inválidos";

		$view = 'view/form.php';
	}
	// Faz a validação do usuário/senha no banco de dados
	else {
		$sql = "SELECT distinct id, nome, email, senha FROM tb_usuario
		WHERE email = '$usuario' AND senha = '$senha'";

		$result = mysqli_query($_conn, $sql);

		echo mysqli_num_rows($result);

		if (mysqli_num_rows($result) > 0) {
			$user = mysqli_fetch_array($result);

			session_start();

			$_SESSION["classiauto_user_id"]  =  $user["id"];
			$_SESSION["classiauto_user_nome"]  =  $user["nome"];
			$_SESSION["classiauto_user_email"]  =  $user["email"];

			Header("Location: " . webroot());
			exit;
		} else { // Não encontrou um usuário/senha no banco de dados
			$message = "Usuário e/ou senha inválidos";
			$view = 'view/form.php';
		}
	}
} else { // Login
	$hasErros = false;
	$view = 'view/form.php'; // Incluindo a view de edição
}

include "../template/index.php";
