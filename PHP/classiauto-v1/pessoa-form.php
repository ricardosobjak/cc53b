<?php
    if(@$_REQUEST['id']) {
        require_once('conexao.php');

        $sql = "SELECT * FROM tb_pessoa 
            WHERE id = " . $_REQUEST['id'];
        
        $result = $_conn->query($sql);

        $pessoa;
        if(mysqli_num_rows($result) > 0)
            $pessoa = mysqli_fetch_array($result);
    }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pessoa</h1>

<form action="pessoa-save.php" method="POST">

    <div>
        <label>Nome</label>
        <input type="text" name="nome" 
                value="<?= @$pessoa['nome'] ?>">
    </div>

    <div>
        <label>E-mail</label>
        <input type="email" name="email" 
            value="<?= @$pessoa['email'] ?>">
    </div>

    <div>
        <label>Telefone</label>
        <input type="tel" name="telefone">
    </div>

    <div>
        <label>Nascimento</label>
        <input type="date" name="nascimento">
    </div>

    <div>
        <label>Login</label>
        <input type="text" name="login">
    </div>

    <div>
        <label>Senha</label>
        <input type="password" name="senha">
    </div>

    <div>
        <button type="submit">Salvar</button>
    </div>

</form>

</body>
</html>