<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<div class="div">
<div class="form">
  <div class="row">
    <form class="col s12" id="reg-form" method="POST" action="">
      <div class="row">
        <div class="input-field col s6">
         <input type="text" name="name" placeholder="Nome">
        </div>
        <div class="input-field col s6">
          <input type="text" name="genre" placeholder="Genre">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="number" name="seasons" placeholder="Seasons" min="1">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="synopsis" placeholder="Synopsis">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="number" name="age_range" placeholder="Age range">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="number" name="lauch_year" placeholder="lauch_year" min="1000">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="main_cast" placeholder="Main cast">
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
  
</body>
</html>
