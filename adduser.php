<?php  
include "conect.php";
// include 'init.php';

$nome = $_POST["nome"] ?? "";
$sobrenome = $_POST["sobrenome"] ?? "";
$cpf = $_POST["cpf"] ?? "";
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";
$conf_senha = $_POST["conf_senha"] ?? "";

$new_senha = md5($senha);
var_dump($cpf);
	

try{
	$smt = $conn-> prepare("SELECT name, password FROM users WHERE cpf = ?");
	$smt-> bindParam(1, $cpf);
	$smt-> execute();
	$b_cpf = $smt->fetch();
	var_dump($b_cpf);

}catch(PDOException $ex){
	 $ex -> getmessage();
}
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