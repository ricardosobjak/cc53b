<?php

require_once('../auth/validate-jwt.inc.php');
//print_r($userAuth);

if (!@$userAuth["admin"]) {
    print_r("nao é admin");
    exit;
}

// Abrir a conexão
require_once('../db/connection.inc.php');
require_once('produto.dao.php');
require_once('produtoCategoria.dao.php');


// Insanciar o DAO
$produtoDAO = new produtoDAO($pdo);
$produtoCategoriaDAO = new produtoCategoriaDAO($pdo);

// Receber os dados do cliente
$json = file_get_contents('php://input');

// Criar um objeto apartir do JSON
$produto = json_decode($json);
$produtoCategoria = json_decode($json);

// Conteúdo de resposta para o cliente
$responseBody = '';

// Inserir o usuário no banco de dados
$produto = $produtoDAO->insert($produto);
foreach ($produto->itens as $produtoCategoria) {
    $produtoCategoria->produto_id = $produto->id;
    $produtoCategoria = $produtoCategoriaDAO->insert($produtoCategoria);
}
$responseBody = json_encode($produto); // Transformar em produto JSON

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);

?>