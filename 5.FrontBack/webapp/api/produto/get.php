<?php
include_once "../enable-cors.php";
include_once "../validate-jwt.inc.php";

require_once "../db/connection.inc.php";
require_once "produto.dao.php";

$produtoDAO = new ProdutoDAO($pdo);

$responseBody;

if (@$_REQUEST['id']) { // Retornar um único objeto pelo ID

    if ($res = $produtoDAO->get($_REQUEST['id'])) {
        $responseBody = json_encode($res);
    }
    else {
        http_response_code(404);
        $responseBody = '{ "message": "Produto não existe" }';
    }
} else { // Retornar todos os objetos
    $responseBody = json_encode(
        $produtoDAO->getAll()
    );
}

header('Content-Type: application/json');
print_r($responseBody);
