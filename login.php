<?php
    session_start(); 
    include 'conect.php';
    include 'init.php';
    //var_dump(genero());
    
?>

<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Sistema de Séries</title>
      <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
          <h1> Login</h1>
 <?php if(isset($_SESSION['logged_in'])){ ?>

    <a href="logout.php">Sair</a>
    
  <?php }else{ ?>

    <form action="login_controller.php" method="post">
      <label for="email">Email: </label>
      <br>
      <input type="text" name="email">
      <br>
      <label for="password">Senha: </label>
      <br>
      <input type="password" name="password">
      <br>
      <input type="submit" value="Entrar">
    </form>
  <?php } ?>
</body>
</html>
        