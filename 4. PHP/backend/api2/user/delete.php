<?php
require_once("../db/connection.inc.php");
require_once("user.dao.php");

$userDAO = new UserDAO($pdo);

$id = @$_REQUEST['id'];

$responseBody = '';

if (!$id) {
    http_response_code(400);
    $responseBody = '{ "message": "ID não informado" }';
} else {
    try {
        if ($userDAO->delete($id) != 1) {
            // Muda o código de resposta HTTP para 'not found'
            http_response_code(404);
            $responseBody = '{ "message": "Usuário não encontrado" }';
        }
    } catch (Exception $e) {
        // Muda o código de resposta HTTP para 'bad request'
        http_response_code(400);
        $responseBody = '{ "message": "Ocorreu um erro ao tentar executar esta ação. Erro: Código: ' .  $e->getCode() . '. Mensagem: ' . $e->getMessage() . '" }';
    }
}

// Define que o conteúdo da resposta será um JSON (application/JSON)
header('Content-Type: application/json');

// Exibe a resposta
print($responseBody);
