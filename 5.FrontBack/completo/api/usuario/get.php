<?php
/**
 * Método para entregar uma lista de usuarios para o cliente
 *
 *Formato de entrega: JSON
 */

require_once('../auth/validate-jwt.inc.php');
//print_r($userAuth);

if (!@$userAuth["admin"]) {
    print_r("nao é admin");
    exit;
}


require_once('../db/connection.inc.php');
require_once('usuario.dao.php');



$usuarioDAO = new usuarioDAO($pdo);

//Buscar as usuarios no DB
$usuarios = $usuarioDAO->getAll();

$responseBody = json_encode($usuarios);

header('Content-type: application/json');
print_r($responseBody);

/*
 include
 include_once
 require
 require_once
*/

?>