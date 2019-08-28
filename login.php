<?php
    include 'init.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
      <title>OSON Séries</title>

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  </head>
  <body>
    <?php if(isset($_SESSION['logged_in'])){ ?>

      <a href="logout.php">Sair</a>
      
    <?php }else{ ?>
      <nav id="inicio" class="navBar" role="navigation">
        <div class="nav-wrapper container">
           <a id="logo-container" href="index.html" class="brand-logo">OSON</a>
          <ul class="right hide-on-med-and-down">
            <li><a href="cadastrar.php">Cadastrar</a></li>
            <li><a href="login.php">Entrar</a></li>
          </ul>
          <ul id="nav-mobile" class="sidenav">
            <li><a href="cadastrar.html">Cadastrar</a></li>
            <li><a href="login.php">Entrar</a></li>
          </ul>
          <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
      </nav>
        <div class="div">
      <div class="form">
      <div class="row">
          <form class="col s12" id="reg-form" method="POST" action="">
            <div class="row">
              <div class="input-field col s6">
                <input type="email" name="email" placeholder="E-mail">
              </div>
                <div class="input-field col s6">
                <input type="password" name="password" placeholder="Password">
              </div>
            </div>
              <div class="input-field col s6">
                <button class="btn btn-large btn-register waves-effect waves-light" type="submit" name="action">Cadastrar
                  <i class="material-icons right">done</i>
                </button>
              </div>
          </form>
     <?php } ?>
    <?php 
      if(isset($_SESSION['preencher'])): ?>
          <div>
            <p style="color: red;">ERRO: Preencha todos os campos.</p>
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
  </body>
</html>
        <?php
    session_start(); 
    include 'conect.php';
    include 'init.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
      <title>OSON Séries</title>

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  </head>
  <body>
    <?php if(isset($_SESSION['logged_in'])){ ?>

      <a href="logout.php">Sair</a>
      
    <?php }else{ ?>
      <nav id="inicio" class="navBar" role="navigation">
        <div class="nav-wrapper container">
           <a id="logo-container" href="index.html" class="brand-logo">OSON</a>
          <ul class="right hide-on-med-and-down">
            <li><a href="cadastrar.php">Cadastrar</a></li>
            <li><a href="login.php">Entrar</a></li>
          </ul>
          <ul id="nav-mobile" class="sidenav">
            <li><a href="cadastrar.html">Cadastrar</a></li>
            <li><a href="login.php">Entrar</a></li>
          </ul>
          <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
      </nav>
        <div class="div">
      <div class="form">
      <div class="row">
          <form class="col s12" id="reg-form" method="POST" action="">
            <div class="row">
              <div class="input-field col s6">
                <input type="email" name="email" placeholder="E-mail">
              </div>
                <div class="input-field col s6">
                <input type="password" name="password" placeholder="Password">
              </div>
            </div>
              <div class="input-field col s6">
                <button class="btn btn-large btn-register waves-effect waves-light" type="submit" name="action">Cadastrar
                  <i class="material-icons right">done</i>
                </button>
              </div>
          </form>
     <?php } ?>
    <?php 
      if(isset($_SESSION['preencher'])): ?>
          <div>
            <p style="color: red;">ERRO: Preencha todos os campos.</p>
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
  </body>
</html>
        