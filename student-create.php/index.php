<?php
session_start();
require 'dbpdo.php';
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>CRUD PHP</title>
</head>

<body>

    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detalhes do Usuário
                            <a href="usuario-create.php" class="btn btn-primary float-end">Adicionar Usuário</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Data de Nascimento</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM usuario";
                                $query_run = $pdo->query($query);

                                if ($query_run->rowCount() > 0) {
                                    foreach ($query_run as $usuario) {
                                ?>
                                        <tr>
                                            <td><?= $usuario['id']; ?></td>
                                            <td><?= $usuario['name']; ?></td>
                                            <td><?= $usuario['email']; ?></td>
                                            <td><?= $usuario['phone']; ?></td>
                                            <td><?= $usuario['date']; ?></td>
                                            <td>
                                                <a href="usuario-view.php?id=<?= $usuario['id']; ?>" class="btn btn-info btn-sm">Visualizar</a>
                                                <a href="usuario-edit.php?id=<?= $usuario['id']; ?>" class="btn btn-success btn-sm">Editar</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_usuario" value="<?= $usuario['id']; ?>" class="btn btn-danger btn-sm">Deletar</button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<h5> Nenhum usuário cadastrado </h5>";
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>