<?php
include("../enable-cors.php");
require_once("../db/connection.inc.php");
require_once("user.dao.php");

$userDAO = new UserDAO($pdo);

$responseBody;

if (@$_REQUEST['id']) { // Retornar um único objeto pelo ID

    if ($res = $userDAO->get($_REQUEST['id']))
        $responseBody = json_encode($res);
    else {
        http_response_code(404);
        $responseBody = '{ "message": "Usuário não existe" }';
    }
} else { // Retornar todos os objetos
    $responseBody = json_encode(
        $userDAO->getAll()
    );
}

header('Content-Type: application/json');
print_r($responseBody);
