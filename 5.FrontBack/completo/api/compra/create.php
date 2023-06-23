<?php



require_once('../auth/validate-jwt.inc.php');

if (!isset($token)) {
    http_response_code(401);
    $responseBody = '{ "message": "Sem token" }';
    exit;
}

$userIdToUpdate = $_GET["id_usuario"] ?? null;

if (!(@$userAuth["admin"] || (isset($userAuth["id"]) && $userAuth["id"] == $userIdToUpdate))) {
    http_response_code(403);
    $responseBody = '{ "message": "Acesso negado" }';
    exit;
}


// Abrir a conexão
require_once('../db/connection.inc.php');
require_once('compra.dao.php');
require_once('itemcompra.dao.php');

// Insanciar o DAO
$compraDAO = new compraDAO($pdo);
$itemCompraDAO = new itemCompraDAO($pdo);

// Receber os dados do cliente
$json = file_get_contents('php://input');

// Criar um objeto apartir do JSON
$compra = json_decode($json);
$itemCompra = json_decode($json);

// Conteúdo de resposta para o cliente
$responseBody = '';

// Inserir o usuário no banco de dados
$compra = $compraDAO->insert($compra);
foreach ($compra->itens as $itemCompra) {
    $itemCompra->compra_id = $compra->id;
    $itemCompra = $itemCompraDAO->insert($itemCompra);
}

$responseBody = json_encode($compra); // Transformar em compra JSON

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);

?>