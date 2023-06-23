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

$id = $_REQUEST['id'];

// Conteúdo de resposta para o cliente
$responseBody = '';

if(!$id)
{
    http_response_code(400);
    $responseBody = '{ "message:" "ID não informado"}';
} else {
    $qtd = $usuarioDAO->delete($id);
    if($qtd == 0){
        $responseBody = '{ "message": "ID não existe"}';
    }
}

// Inserir o usuário no banco de dados
$usuario = $usuarioDAO->delete($id);
$responseBody = json_encode($usuario); // Transformar em usuario JSON

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);

?>
