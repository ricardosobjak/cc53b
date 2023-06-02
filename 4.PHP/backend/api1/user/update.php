<?php
include("../enable-cors.php");
require_once("../db/connection.inc.php");

// Obter o corpo da requisição
$json = file_get_contents('php://input');

// Transforma o JSON em um Objeto PHP
$user = json_decode($json);

$id = @$_REQUEST['id'];

$responseBody = '';

if (!$id) {
    http_response_code(400);
    $responseBody = '{ "message": "ID não informado" }';
} else {
    try {
        $stmt = $pdo->prepare("UPDATE tb_usuario
            SET
                nome = :nome,
                nascimento = :nascimento,
                telefone = :telefone,
                email = :email
            WHERE
                id = :id");

        $data = [
            'id' => $id,
            'nome' => $user->nome,
            'nascimento' => $user->nascimento,
            'telefone' => $user->telefone,
            'email' => $user->email,
        ];

        $res = $stmt->execute($data);
    } catch (Exception $e) {
        // Muda o código de resposta HTTP para 'bad request'
        http_response_code(400);
        $responseBody = '{ "message": "Ocorreu um erro ao tentar executar esta ação. Erro: Código: ' .  $e->getCode() . '. Mensagem: ' . $e->getMessage() . '" }';
    }
}

// Defique que o conteúdo da resposta será um JSON (application/JSON)
header('Content-Type: application/json');

// Exibe a resposta
print_r($responseBody);
