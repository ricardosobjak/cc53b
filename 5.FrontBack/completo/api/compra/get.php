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

require_once('../db/connection.inc.php');
require_once('compra.dao.php');

$compraDAO = new compraDAO($pdo);
$compras = $compraDAO->getAll();

$responseBody = json_encode($compras);

header('Content-type: application/json');
print_r($responseBody);

?>