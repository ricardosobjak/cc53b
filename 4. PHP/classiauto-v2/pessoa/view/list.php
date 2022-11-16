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
            <?php foreach ($pessoas as $index => $pessoa): ?>
            <tr>
                <td><?= $pessoa->id ?></td>
                <td><?= $pessoa->nome ?></td>
                <td><?= $pessoa->nascimento ?></td>
                <td><?= $pessoa->telefone ?></td>
                <td><?= $pessoa->login ?></td>
                <td>
                    <a href="pessoa-form.php?id=<?= $pessoa->id ?>">Editar</a>
                    <a href="pessoa-delete.php?id=<?= $pessoa->id ?>">Remover</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>