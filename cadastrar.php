<?php

    require 'init.php';

    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Funcionários</title>
    <!-- Agregando o Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .card{
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <div class="card-header">Cadastro de Funcionário</div>
            <div class="card-body">
                <form action="add.php" method="post">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="nome">Nome: </label>
                            <input class="form-control" type="text" name="nome" id="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="cargo">Cargo: </label>
                            <input class="form-control" type="text" name="cargo" id="cargo" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="cargo">Departamento: </label>
                            <input class="form-control" type="text" name="departamento" id="departamento" required>
                        </div>
                        <div class="col-md-6">
                            <label for="cargo">Remuneração: </label>
                            <input class="form-control" type="text" name="remuneracao" id="remuneracao" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="sexo" value="m" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Masculino
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="sexo" value="f">
                                <label class="form-check-label" for="sexo">
                                    Feminino
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="dtnascimento">Data de Nascimento: </label>
                            <input  class="form-control" type="text" name="dtnascimento" id="dtnascimento" placeholder="dd/mm/YYYY" required>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success" value="Cadastrar">
                </form>
            </div>
        </div>



    </div>


    <!--Agregando Jquery e JS-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
