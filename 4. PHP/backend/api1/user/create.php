<?php
require_once("../db/connection.inc.php");

// Obter o corpo da requisição
$json = file_get_contents('php://input');

// Transforma o JSON em um Objeto PHP
$user = json_decode($json);

$responseBody = '';

try {
    $stmt = $pdo->prepare("INSERT INTO tb_usuario (nome, nascimento, email, senha) VALUES (:nome, :nascimento, :email, :senha)");
    $stmt->bindValue(':nome', $user->nome);
    $stmt->bindValue(':nascimento', $user->nascimento);
    $stmt->bindValue(':email', $user->email);
    $stmt->bindValue(':senha', $user->senha);

    $stmt->execute();
    $user->id = $pdo->lastInsertId();

    $responseBody = json_encode($user);
} catch (Exception $e) {
    // Muda o código de resposta HTTP para 'bad request'
    http_response_code(400);
    $responseBody = '{ "message": "Ocorreu um erro ao tentar executar esta ação. Erro: Código: ' .  $e->getCode() . '. Mensagem: ' . $e->getMessage() . '" }';
}

// Defique que o conteúdo da resposta será um JSON (application/JSON)
header('Content-Type: application/json');

// Exibe a resposta
print_r($responseBody);
