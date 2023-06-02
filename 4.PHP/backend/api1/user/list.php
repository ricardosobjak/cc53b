<?php
include("../enable-cors.php");
require_once("../db/connection.inc.php");

$responseBody;


if (@$_REQUEST['id']) { // Retornar um único objeto pelo ID
    //Prepare our select statement.
    $stmt = $pdo->prepare("SELECT * FROM tb_usuario WHERE id = ?");
    $stmt->bindParam(1, $_REQUEST['id']);

    if ($stmt->execute()) {
        //Fetch the table row in question.
        //$row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($res = $stmt->fetchObject())
            $responseBody = json_encode($res);
        else {
            http_response_code(404);
            $responseBody = '{ "message": "Usuário não existe" }';
        }
    }
} else { // Retornar todos os objetos
    //Prepare our select statement.
    $stmt = $pdo->prepare("SELECT * FROM tb_usuario");
    $stmt->execute();

    //Fetch the table row in question.
    $res = $stmt->fetchAll(PDO::FETCH_CLASS);
    $responseBody = json_encode($res);
}

header('Content-Type: application/json');
print_r($responseBody);
