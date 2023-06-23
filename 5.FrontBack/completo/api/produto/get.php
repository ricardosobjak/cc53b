<?php
/**
 * Método para entregar uma lista de produtos para o cliente
 *
 *Formato de entrega: JSON
 */

 require_once('../db/connection.inc.php');
 require_once('produto.dao.php');

 $produtoDAO = new produtoDAO($pdo);

 //Buscar as produtos no DB
 $produtos = $produtoDAO->getAll();

 $responseBody = json_encode($produtos);

 header('Content-type: application/json');
 print_r($responseBody);

?>