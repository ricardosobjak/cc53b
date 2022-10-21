<?php
    require_once('conexao.php');

    // print_r( $_GET );
    // print_r( $_POST );
    // print_r( $_REQUEST );

    $pessoa = $_POST;

    $sql = 'INSERT INTO tb_pessoa (
        nome, 
        email, 
        telefone,
        nascimento,
        login,
        senha
    ) VALUE (
    "' . $pessoa['nome'] . '",
    "' . $pessoa['email'] . '",
    "' . $pessoa['telefone'] . '",
    "' . $pessoa['nascimento'] . '",
    "' . $pessoa['login'] . '",
    "' . $pessoa['senha'] . '"
    )';
    
    $result = $_conn->query($sql);
    print_r($result);

    if($result) echo "Pessoa inserida!";
    else echo "Falha do salvar pessoa";
?>