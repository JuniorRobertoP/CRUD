<?php
session_start();
require 'dbcon.php';
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
                        <h4>Editar aluno 
                            <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $pessoa_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM pessoa WHERE id='$pessoa_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="pessoa_id" value="<?= $pessoa['id']; ?>">

                                    <div class="mb-3">
                                        <label>Nome</label>
                                        <input type="text" name="nome" value="<?=$pessoa['nome'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Data de Nascimento</label>
                                        <input type="text" name="data_nascimento" value="<?=$pessoa['data_nascimento'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Peso</label>
                                        <input type="text" name="peso" value="<?=$pessoa['peso'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Altura</label>
                                        <input type="text" name="altura" value="<?=$pessoa['altura'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_pessoa" class="btn btn-primary">
                                            Atualizar Pessoa
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