<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pessoa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <h1>Pessoa</h1>


        <?php if (@$message) : ?>

            <div class="toast fade show align-items-center text-bg-warning border-0 mx-auto my-3" role="alert" aria-live="polite" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <?= @$message ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>

        <?php endif; ?>

        <form action="controller.php" method="POST">
            <input type="hidden" name="action" value="salvar">
            <input type="hidden" name="id" value="<?= @$pessoa->id ?>">


            <div>
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" value="<?= @$pessoa->nome ?>">
            </div>

            <div>
                <label>E-mail</label>
                <input type="email" name="email" class="form-control" value="<?= @$pessoa->email ?>">
            </div>

            <div>
                <label>Telefone</label>
                <input type="tel" name="telefone" value="<?= @$pessoa->telefone ?>" class="form-control">
            </div>

            <div>
                <label>Nascimento</label>
                <input type="date" name="nascimento" value="<?= @$pessoa->nascimento ?>" class="form-control" class="form-control">
            </div>

            <div>
                <label>Login</label>
                <input type="text" name="login" value="<?= @$pessoa->login ?>" class="form-control">
            </div>

            <div>
                <label>Senha</label>
                <input type="password" name="senha" class="form-control">
            </div>

            <div>
                <button class="btn btn-success mt-3" type="submit">Salvar</button>
                <a href="controller.php" class="btn btn-light mt-3 ms-1">Cancelar</a>
            </div>

        </form>
    </div>
</body>

</html>