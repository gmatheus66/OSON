<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
</head>
<body>
	<form action="adduser.php" method="POST">
		<input type="text" name="nome" placeholder="Nome">
		<input type="text" name="sobrenome" placeholder="Sobrenome">
		<input type="text" name="cpf" placeholder="CPF">
		<input type="email" name="email" placeholder="Email">
		<input type="password" name="senha" placeholder="Senha">
		<input type="password" name="conf_senha" placeholder="Confirmar Senha">
		<input type="submit">
	</form>
</body>
</html>