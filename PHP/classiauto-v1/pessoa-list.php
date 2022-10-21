<?php
    // Estabelece a conexão (disponibiliza a var. $_conn)
    require_once('conexao.php');

    $sql = "SELECT * FROM tb_pessoa"; // SQL de consulta

    $result = $_conn->query($sql); // Faz a consulta no DB
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
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Nascimento</th>
                <th>Telefone</th>
                <th>Login</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while($pessoa = mysqli_fetch_array($result)): ?>
            <tr>
                <td><?= $pessoa['id'] ?></td>
                <td><?= $pessoa['nome'] ?></td>
                <td><?= $pessoa['nascimento'] ?></td>
                <td><?= $pessoa['telefone'] ?></td>
                <td><?= $pessoa['login'] ?></td>
                <td>
                    <a href="pessoa-form.php?id=<?= $pessoa['id'] ?>">Editar</a>
                    <a href="pessoa-del.php?id=<?= $pessoa['id'] ?>">Remover</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>