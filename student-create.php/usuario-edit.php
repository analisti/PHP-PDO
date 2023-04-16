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

    <title>Student Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar usuário 
                            <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
       
                            $usuario_id = htmlspecialchars($_GET['id']);
                            $query = "SELECT * FROM usuario WHERE id=:usuario_id";
                            $stmt = $pdo->prepare($query);
                            $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
                            $stmt->execute();

                            if($stmt->rowCount() > 0)
                            {
                                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="usuario_id" value="<?= $usuario['id']; ?>">

                                    <div class="mb-3">
                                        <label>Nome</label>
                                        <input type="text" name="name" value="<?=$usuario['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?=$usuario['email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Telefone</label>
                                        <input type="text" name="phone" value="<?=$usuario['phone'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Data de Nascimento</label>
                                        <input type="date" name="date" value="<?=$usuario['date'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_usuario" class="btn btn-primary">
                                            Atualizar Usuário
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>Nenhum ID encontrado</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
