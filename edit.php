<?php

require_once 'init.php';

// resgata os valores do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$cargo = isset($_POST['cargo']) ? $_POST['cargo'] : null;
$departamento = isset($_POST['departamento']) ? $_POST['departamento'] : null;
$remuneracao = isset($_POST['remuneracao']) ? $_POST['remuneracao'] : null;
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : null;
$dtnascimento = isset($_POST['dtnascimento']) ? $_POST['dtnascimento'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

//Converte data de dd/mm/yyyy para yyyy-mm-dd

$data = str_replace("/", "-", $dtnascimento);
$dtnascimento = date('Y-m-d', strtotime($data));


// atualiza informações do funcionário no banco
$PDO = db_connect();
$sql = "UPDATE funcionarios SET nome = :nome, cargo = :cargo, departamento = :departamento, remuneracao = :remuneracao , sexo = :sexo, dtnascimento = :dtnascimento WHERE id = :id";

$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':cargo', $cargo);
$stmt->bindParam(':departamento', $departamento);
$stmt->bindParam(':remuneracao', $remuneracao);
$stmt->bindParam(':sexo', $sexo);
$stmt->bindParam(':dtnascimento', $dtnascimento);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute())
{
    header('Location: index.php');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}