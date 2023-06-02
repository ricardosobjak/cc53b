<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
</head>
<body>
    
    <div class="container">
        <h1>Pessoa</h1>

        <a href="?action=novo" class="btn btn-primary">Novo</a>
    

        <?php if(@$message) : ?>
            <div class="alert alert-info w-50 mx-auto">
                <?= @$message ?>
            </div>
        <?php endif; ?>
        
        <table class="table table-striped table-hover">
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
                        <a class="btn btn-sm btn-secondary" href="controller.php?action=editar&id=<?= $pessoa->id ?>"><i class="bi bi-pencil-square"></i></a>
                        <a class="btn btn-sm btn-secondary" href="controller.php?action=deletar&id=<?= $pessoa->id ?>"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>