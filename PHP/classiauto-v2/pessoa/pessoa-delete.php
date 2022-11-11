<?php

require_once('conexao.php');

// Obter o parâmetro ID passado na requisição
$id = @$_REQUEST['id'];

if($id) {
    // Deletar a pessoa no DB
    $sql = "DELETE FROM tb_pessoa WHERE id = $id";

    $res = $_conn->query($sql);
    
    print_r($res);

} else {
    echo "ID não informado!";
}
