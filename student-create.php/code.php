<?php
session_start();
require 'dbpdo.php';

if(isset($_POST['delete_usuario']))
{
    $usuario_id = $_POST['delete_usuario'];

    $query = "DELETE FROM usuario WHERE id=:id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $usuario_id);

    if($stmt->execute())
    {
        $_SESSION['message'] = "Usuário excluido com sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Não foi possivel excluir o usuário";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_usuario']))
{
    $usuario_id = $_POST['usuario_id'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];

    $query = "UPDATE usuario SET name=:name, email=:email, phone=:phone, date=:date WHERE id=:id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':id', $usuario_id);

    if($stmt->execute())
    {
        $_SESSION['message'] = "Usuário atualizado com sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Usuário não atualizado";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_usuario']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];

    $query = "INSERT INTO usuario (name,email,phone,date) VALUES (:name,:email,:phone,:date)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':date', $date);

    if($stmt->execute())
    {
        $_SESSION['message'] = "Usuário cadastrado com sucesso!";
        header("Location: usuario-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Usuário não cadastrado";
        header("Location: usuario-create.php");
        exit(0);
    }
}
?>
