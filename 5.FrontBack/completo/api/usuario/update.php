<?php

require_once('../auth/validate-jwt.inc.php');
//print_r($userAuth);


if (!isset($token)) {
    // Muda o código de resposta HTTP para 'Unauthorized'
    http_response_code(401);
    $responseBody = '{ "message": "Sem token" }';
    exit;
}

$userIdToUpdate = $_GET["id"];

if (!(@$userAuth["admin"] || ($userAuth["id"] == $userIdToUpdate))) { 
    // Muda o código de resposta HTTP para 'Forbidden'
    http_response_code(403);
    $responseBody = '{ "message": "Acesso negado" }';
    exit;
}

//$userIdToUpdate é uma variável em PHP que armazena o valor do ID do usuário que você deseja atualizar.
//No contexto do código fornecido, essa variável é obtida a partir do parâmetro "id" presente na URL.

// Abrir a conexão
require_once('../db/connection.inc.php');
require_once('usuario.dao.php');

// Insanciar o DAO
$usuarioDAO = new usuarioDAO($pdo);

// Conteúdo de resposta para o cliente
$responseBody = '';

//obtendo o parâmetro id vindo pela URP da requisição
$id = $_REQUEST["id"];

if (!$id) {
    $respondeBody = '{"message": "Usuário não informado"}';
    http_response_code(404);
} else {
    // Receber os dados do cliente
    $json = file_get_contents('php://input');

    // Criar um objeto apartir do JSON
    $usuario = json_decode($json);

    // Inserir o usuário no banco de dados
    $usuario = $usuarioDAO->update($id, $usuario);
    $responseBody = json_encode($usuario); // Transformar em usuario JSON
}

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);

?>