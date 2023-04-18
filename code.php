<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_pessoa']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_pessoa']);

    $query = "DELETE FROM pessoa WHERE id='$pessoa_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Pessoa excluída com sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Não foi possivel excluir a pessoa";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_pessoa']))
{
    $pessoa_id = mysqli_real_escape_string($con, $_POST['pessoa_id']);

    $nome = mysqli_real_escape_string($con, $_POST['name']);
    $data_nascimento = mysqli_real_escape_string($con, $_POST['data_nascimento']);
    $peso = mysqli_real_escape_string($con, $_POST['peso']);
    $altura = mysqli_real_escape_string($con, $_POST['altura']);

    $query = "UPDATE pessoa SET name='$nome', data_nascimento='$data_nascimento', peso='$peso', altura='$altura' WHERE id='$pessoa_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Pessoa atualizada com sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Pessoa não atualizado";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_pessoa']))
{
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $data_nascimento = mysqli_real_escape_string($con, $_POST['data_nascimento']);
    $peso = mysqli_real_escape_string($con, $_POST['peso']);
    $altura = mysqli_real_escape_string($con, $_POST['altura']);

    $query = "INSERT INTO pessoa (nome,data_nascimento,peso,altura) VALUES ('$nome','$data_nascimento','$peso','$altura')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Pessoa cadastrada com sucesso!";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Pessoa não cadastrado";
        header("Location: student-create.php");
        exit(0);
    }
}

?>