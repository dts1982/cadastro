<?php

require_once 'init.php';

//Abre a conexão

$PDO = db_connect();

// SQL para contar o total de registros

$sql_count = "SELECT COUNT(*) AS total FROM funcionarios ORDER BY nome ASC";



// SQL para selecionar os registros
$sql = "SELECT id, nome, cargo, departamento, remuneracao, sexo, dtnascimento FROM funcionarios ORDER BY nome ASC";

// conta o total de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Funcionários</title>
    <!-- Agregando o Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script type="text/javascript" src="script.js"></script>
    <style>
        .card{
            margin-top: 20px;
        }
    </style>
    <script>
        $(document).ready(function () {
            $(".data").mask("99/99/9999");
            $(".money").mask("R$###.###.###,##");
        });
    </script>
</head>
<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Funcionários Cadastrados</div>
            <div class="card-body">
                <p><a href="cadastrar.php"><button type="button" class="btn btn-success btn-sm">Adicionar Funcionário</button></a>
                

                <?php if ($total > 0): ?>
                <div class="table-responsive">
                    <table class="table table-striped" width="50%" id="tabela">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Cargo</th>
                            <th>Departamento</th>
                            <th>Remuneração</th>
                            <th>Sexo</th>
                            <th>Data de Nascimento</th>
                            <th>Ações</th>
                        </tr>
                        <tr>
                            <th><input class="form-control" type="text" id="txtColuna1"/></th>
                            <th><input class="form-control" type="text" id="txtColuna2"/></th>
                            <th><input class="form-control" type="text" id="txtColuna3"/></th>
                            <th><input class="form-control" type="text" id="txtColuna4"/></th>
                            <th><input class="form-control" type="text" id="txtColuna5"/></th>
                            <th><input class="form-control" type="text" id="txtColuna6"/></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($func = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td><?php echo $func['nome'] ?></td>
                                <td><?php echo $func['cargo'] ?></td>
                                <td><?php echo $func['departamento'] ?></td>
                                <td class="money"><?php echo "R$ ".number_format($func['remuneracao'],2,",",".") ?></td>
                                <td><?php echo ($func['sexo'] == 'm') ? 'Masculino' : 'Feminino' ?></td>
                                <?php $source = $func['dtnascimento'];
                                        $date = new DateTime($source);?>
                                <td class="data"><?php echo $date->format('d/m/Y'); ?></td>
                                <td>
                                    <a href="editar.php?id=<?php echo $func['id'] ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button></a>
                                    <a href="delete.php?id=<?php echo $func['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');"><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <?php 
                    endif;              
                ?>
                
                <p>Total de usuários: <?php echo $total ?></p>
            </div>
        </div>
    </div>
</body>
</html>
