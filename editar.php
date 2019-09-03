<?php
require 'init.php';

// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

// valida o ID
if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}

// busca os dados du usuário a ser editado
$PDO = db_connect();
$sql = "SELECT nome, cargo, departamento, remuneracao , sexo, dtnascimento FROM funcionarios WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$stmt->execute();

$func = $stmt->fetch(PDO::FETCH_ASSOC);

$data = str_replace("/", "-", $func['dtnascimento']);
$dtnascimento = date('d/m/Y', strtotime($data));

// se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
if (!is_array($func))
{
    echo "Nenhum usuário encontrado";
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Funcionário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Agregando Jquery e JS-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        .card{
            margin-top: 20px;
        }
    </style>
    <script>
        $(document).ready(function () {
            $(".data").mask("99/99/9999");
            $("#remuneracao").mask("R$###.###.###,##");
        });
    </script>

</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">Editar de Funcionário</div>
        <div class="card-body">
            <form action="edit.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <label for="nome">Nome: </label>
                    <input class="form-control" type="text" name="nome" id="nome" value="<?php echo $func['nome'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="cargo">Cargo: </label>
                    <input class="form-control" type="text" name="cargo" id="cargo" value="<?php echo $func['cargo'] ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="departamento">Departamento: </label>
                    <input class="form-control" type="text" name="departamento" id="departamento" value="<?php echo $func['departamento'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="remuneracao">Remuneração: </label>
                    <input class="form-control" type="text" name="remuneracao" id="remuneracao" value="<?php echo $func['remuneracao'] ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="sexo">Sexo: </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" id="sexo" value="m"  <?php if ($func['sexo'] == 'm'): ?> checked="checked" <?php endif; ?>>
                        <label class="form-check-label" for="sexo">
                            Masculino
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" id="sexo" value="f" <?php if ($func['sexo'] == 'f'): ?> checked="checked" <?php endif; ?>>
                        <label class="form-check-label" for="sexo">
                            Feminino
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="dtnascimento">Data de Nascimento: </label>
                    <br>
                    <input type="text" class="form-control" name="dtnascimento" id="dtnascimento" placeholder="dd/mm/YYYY" value="<?php echo $dtnascimento ?>">
                </div>
            </div>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <br>
                <input type="submit" class="btn btn-success" value="Alterar">
            </form>
        </div>
    </div>
</div>




    </form>
    
</body>
</html>