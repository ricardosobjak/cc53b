<?php
/**
 * Método para entregar uma lista de categorias para o cliente
 *
 *Formato de entrega: JSON
 */

require_once('../db/connection.inc.php');
require_once('categoria.dao.php');

$categoriaDAO = new categoriaDAO($pdo);

//Buscar as categorias no DB
$categorias = $categoriaDAO->getAll();

$responseBody = json_encode($categorias);

header('Content-type: application/json');
print_r($responseBody);

?>