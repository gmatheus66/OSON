<!DOCTYPE html>
<html>
	<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	  <meta name="viewport" content="width=device-width, initial-scale=1"/>
	  <title>OSON Séries</title>

	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	</head>
<body>
  <nav id="inicio" class="navBar" role="navigation">
    <div class="nav-wrapper container">
       <a id="logo-container" href="index.html" class="brand-logo">OSON</a>
     <ul class="right hide-on-med-and-down">
        <li><a href="cadastrar.php">Cadastrar</a></li>
        <li><a href="#">Entrar</a></li>
      </ul>
      <ul id="nav-mobile" class="sidenav">
        <li><a href="cadastrar.html">Cadastrar</a></li>
        <li><a href="#">Entrar</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
  </div>
  </nav>
  <div class="div">
<div class="form">
<div class="row">
    <form class="col s12" id="reg-form" method="POST" action="adduser.php">
      <div class="row">
        <div class="input-field col s6">
         <input type="text" name="nome" placeholder="Nome">
        </div>
        <div class="input-field col s6">
          <input type="text" name="username" placeholder="Username">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="cpf" placeholder="CPF">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="email" name="email" placeholder="Email">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="password" name="senha" placeholder="Senha">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="password" name="conf_senha" placeholder="Confirmar Senha">
        </div>
      </div>
        <div class="input-field col s6">
          <button class="btn btn-large btn-register waves-effect waves-light" type="submit" name="action">Cadastrar
            <i class="material-icons right">done</i>
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

    <footer class="page-footer teal2">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Sobre</h5>
          <p class="grey-text text-lighten-4">Site criado pelos alunos do 3º período do Instituto Federal de Pernambuco, curso Informática para Internet.</p>
           <a href="#inicio" class="return">Voltar ao topo</a>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        Instituto Federal de Pernambuco - 2019.
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
</body>
</html>














