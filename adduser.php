<?php
include "init.php";
include 'funcs/init.php';

$nome = $_POST["nome"] ?? "";
$sobrenome = $_POST["sobrenome"] ?? "";
$cpf = $_POST["cpf"] ?? "";
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";
$conf_senha = $_POST["conf_senha"] ?? "";
$username = $_POST["username"];
$new_pass = md5($senha);

$teste_cpf;
$teste_un;

try{

	$smt = $conn-> prepare("SELECT cpf FROM users;");
	$smt-> execute();
	$b_cpf = $smt->fetchAll();

	$smmt = $conn -> prepare("SELECT username FROM users;");
	$smmt -> execute();
	$un= $smmt -> fetchAll();

}catch(PDOException $ex){
	 $ex -> getmessage();
}

foreach ($b_cpf as $value_cpf) {
	if ($b_cpf[$value_cpf] != $cpf) {
		$teste_cpf = true;
	}else{
		$teste_cpf = false;
	}
}

foreach ($un as $value_un) {
	if ($un[$value_un] != $un) {
		$teste_un = true;
	}else{
		$teste_un = false;
	}
}


if ($senha != $conf_senha){
	redirect('cadastrar.php?ms=Senhas nulas ou não conferem.');
}

if ($cpf == null || $cpf == " ") {
	redirect('cadastrar.php?ms=CPF invalido ou nulo');
}

if ($teste_cpf == true && $teste_un == true) {
	try{

		$oson = $conn ->prepare("INSERT INTO users(name, username, email, password, cpf) VALUES (?, ?, ?, ?, ?)");
		$oson -> bindParam(1, $nome);
		$oson -> bindParam(2, $username);
		$oson -> bindParam(3, $email);
		$oson -> bindParam(4, $new_pass);
		$oson -> bindParam(5, $cpf);
		$oson -> execute();

	}catch(Exception $ex){
		print_r($ex);
	}
}else{
	redirect("cadastrar.php?ms=CPF invalido ou Username nulo.");
}

redirect("login.php");
?>