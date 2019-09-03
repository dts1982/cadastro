<?php

require_once 'init.php';

//Pega os dados do formulário via POST

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$cargo = isset($_POST['cargo']) ? $_POST['cargo'] : null;
$departamento = isset($_POST['departamento']) ? $_POST['departamento'] : null;
$remuneracao = isset($_POST['remuneracao']) ? $_POST['remuneracao'] : null;
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : null;
$dtnascimento = isset($_POST['dtnascimento']) ? $_POST['dtnascimento'] : null;

// Converter a data de nascimento de dd/mm/yyyy para yyyy-mm-dd

$data = str_replace("/", "-", $dtnascimento);
$dtnascimento = date('Y-m-d', strtotime($data));

//Insere os dados no banco de dados

$PDO = db_connect();
$sql = "INSERT INTO funcionarios(nome, cargo, departamento, remuneracao, sexo, dtnascimento) VALUES(:nome, :cargo, :departamento, :remuneracao, :sexo, :dtnascimento)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':cargo', $cargo);
$stmt->bindParam(':departamento', $departamento);
$stmt->bindParam(':remuneracao', $remuneracao);
$stmt->bindParam(':sexo', $sexo);
$stmt->bindParam(':dtnascimento', $dtnascimento);

if($stmt->execute()){
    header('Location: index.php');
}
else
{
    echo "Erro ao Cadastrar";
    print_r($stmt->errorInfo());
}