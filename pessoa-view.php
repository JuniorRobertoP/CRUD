<?php
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

    <title>Detalhes da pessoa</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Dados da pessoa 
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
                                $pessoa = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Nome</label>
                                        <p class="form-control">
                                            <?=$pessoa['nome'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Data de Nascimento</label>
                                        <p class="form-control">
                                            <?=$pessoa['data_nascimento'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Peso</label>
                                        <p class="form-control">
                                            <?=$pessoa['peso'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Altura</label>
                                        <p class="form-control">
                                            <?=$pessoa['altura'];?>
                                        </p>
                                    </div>

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