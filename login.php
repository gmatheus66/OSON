<?php
    include 'init.php';
?>
<!DOCTYPE html>
  <html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
      <title>OSON Séries</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <title>Sistema de Séries</title>
      <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
       <nav id="inicio" class="navBar" role="navigation">
    <div class="nav-wrapper container">
       <a id="logo-container" href="index.php" class="brand-logo">OSON</a>
     <ul class="right hide-on-med-and-down">
        <li><a href="cadastrar.php">Cadastrar</a></li>
        <li><a href="login.php">Entrar</a></li>
      </ul>
  </div>
  </nav>
 <div class="div">
<div class="form">
<div class="row">
    <form class="col s12" id="reg-form" method="POST" action="login_controller.php">
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="email" placeholder="Email ou CPF">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="password" name="password" placeholder="Senha">
        </div>
      </div>
      <?php if(isset($_SESSION['logged_in'])){ ?>

         <a href="logout.php">Sair</a>
         
       <?php }else{ ?>
          <?php 
         if(isset($_SESSION['preencher'])): ?>
             <div>
               <p style="color: red;">Preencha todos os campos.</p>
             </div>
             <?php
             endif;
             unset($_SESSION['preencher']);

              if(isset($_SESSION['senha_incorreta'])): ?>
             <div>
               <p style="color: red;">ERRO: E-mail ou Senha incorreto.</p>
             </div>
             <?php
             endif;
             unset($_SESSION['senha_incorreta']);

             if(isset($_SESSION['nao_cadastrado'])): ?>
             <div>
               <p style="color: red;">ERRO: Usuário não cadastrado.</p>
             </div>
             <?php
             endif;
             unset($_SESSION['nao_cadastrado']);
             ?>
        <div class="input-field col s6">
          <button class="btn btn-large btn-register waves-effect waves-light" type="submit" name="action">Entrar
            <i class="material-icons right">arrow_forward</i>
          </button>

        </div>
      </div>
    </form>
  </div>
</div>  
  <?php } ?>
 
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
        