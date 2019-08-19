<?php  
include "conect.php";
include 'funcs/init.php';

$nome = $_POST["nome"] ?? "";
$sobrenome = $_POST["sobrenome"] ?? "";
$cpf = $_POST["cpf"] ?? "";
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";
$conf_senha = $_POST["conf_senha"] ?? "";
$username = $_POST["username"];
$new_senha = md5($senha);

try{

	$smt = $conn-> prepare("SELECT cpf FROM users;");
	// $smt-> bindParam(1, $cpf);
	$smt-> execute();
	$b_cpf = $smt->fetch();
	var_dump($b_cpf);

	$smmt = $conn -> prepare("SELECT username FROM users;");
	$smmt -> execute();
	$un= $smmt -> fetch();
	var_dump($un);

}catch(PDOException $ex){
	 $ex -> getmessage();
}

// foreach ($un => $value) {
// 	if ($un[$value] != $username) {
// 		$teste = true;
// 	}
// }

// foreach ($b_cpf => $value) {
// 	if ($b_cpf[$value] != $cpf) {
// 		$teste = true;
// 	}
// }


if ($senha != $conf_senha){
	redirect('cadastro.php?ml=Senhas não conferem');
}

if ($senha == '' || $conf_senha == " " || $conf_senha =='' || $conf_senha == null || $senha == null ) {
	redirect('cadastro.php?mr=Senha não pode estar em branco ou nulo');
}

if ($cpf == null || $cpf == " ") {
	redirect('cadastro.php?mt=CPF invalido ou nulo');
}
?>