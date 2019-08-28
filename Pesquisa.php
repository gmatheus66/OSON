<?php 
    include 'init.php';
?>

<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Sistema de Séries</title>

  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
 <style>
        .tabela{
            margin-top: 10%;
        }
        .tabela, td, tr{

            border: 1px solid black;
            border-collapse: collapse;
        }
        
        </style>
    </head>
    <body>



<nav id="inicio" class="navBar" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">OSON</a>
      <ul class="right hide-on-med-and-down">
        <?php 
          if (isset($_SESSION['id'])) {
        ?>
            <li><a href="form_serie.php">Cadastrar Séries</a></li>
            <li><a href="Pesquisa.php">Pesquisar</a></li> 
            <li><a href="logout.php">Sair</a></li>
          <?php  
          }else{ 
          ?>
            <li><a href="cadastrar.php">Cadastrar</a></li>
            <li><a href="login.php">Entrar</a></li>
        <?php
          }
        ?>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div class="container">
   <div class="row">
      <div class="col s11">
        <div class="row">
          <div class="input-field col s11">
            <i class="material-icons prefix">search</i>
            <label for="autocomplete-input">Pesquisa</label>
            <input type="text" name="Serie" id="autocomplete-input" class="autocomplete">
             <button class="btn waves-effect waves-light" type="submit" name="action">Pesquisar
                  <i class="material-icons right">search</i>
              </button>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="input-field col s9">
    <select name="select_genero" id="select">
      <option select>Genero</option>
      <?php foreach (genero() as $val): ?>
        <option value="<?= $val["genre"] ?>" > <?= $val["genre"] ?> </option>
      <?php endforeach ?>          
    </select>     
  </div>
    <table class="responsive-table">
          
      </table>
      
        <p></p>

</body>
<script>



  $(document).ready(function(){


 $('select').formSelect();


  })
</script>

 <script>      


        $(function(){
            $('input[type=submit]').on('click',function(){
              
             
              let dados = $('#autocomplete-input').serializeArray(); 
              let dados2 = $('select').serialize();
              if($('select').val() != 'Genero'){
                dados.push({name:'select_genero', value: $('select').val()} );
              }
             console.log(dados);
              //console.log(dados);

              $.ajax({
                  type      : 'POST',
                  url       : 'pesq_serie.php',
                  data      : dados,
                  dataType  : 'html',
                  async: true,  
                success : function(txt){

                    console.log(txt);

                     var data = JSON.parse(txt);
                     //console.log(data);
                    $('tr').remove(); 
                    $('p').hide();
                    $('table').addClass("tabela");
                     $('table').append(
                          '<tr>'+'<th>' + 'Nome' + '</th>' +  
                          '<th>'+ 'Genero' + '</th>'+
                          '<th>'+ 'Temporada'+ '</th>' +
                          '<th>'+ 'Sinopse' + '</th>' +
                          '<th>'+ 'Faixa etaria' + '</th>'+
                          '<th>'+ 'Data de Lançamento' + '</th>'+
                          '<th>' + 'Elenco' + '</th>'+ 
                          '<th>' + 'Nota dos Usuarios' + '</th>'+ '</tr>'+
                          '<tr>' +  '<td>' + data.name +'</td>' + 
                          '<td>' + data.genre +'</td>' +
                          '<td>' + data.seasons +'</td>' +
                          '<td>' + data.synopsis +'</td>' +
                          '<td>' + data.age_range +'</td>' +
                          '<td>' + data.lauch_year +'</td>' +
                          '<td>' + data.main_cast +'</td>' + 
                          '<td>' + data.rating +'</td>' +                   

                          '</tr>'
                        );                    

                      $('.autocomplete').val(''); 
                      $('select').prop('selectedIndex',0);

                   
                   
                },
                error: function(data) {
                    $('p').show(); 
                    $('tr').remove();
                    $('p').html('Digite ou escolha uma opcao para a pesquisa');
                }
            });
 
            });


            $('#select').on('click',function(){
              //console.log($('#select').serialize());
              //
              //$('.autocomplete').val(''); 
              console.log('click');
              let dados = $('#select').serialize();
              if($('select').val() == "Genero"){

                $('select').prop('selectedIndex',0);
                $('p').show();
                $('tr').remove();
                $('p').html('Digite ou escolha uma opcao para a pesquisa');

              }else{

                  $.ajax({
                      type: 'POST',
                      url: 'pesq_serie.php',
                      data: dados,
                      dataType: 'html',

                      success: function(data){

                        console.log(data);
                        let d = JSON.parse(data);
                        console.log(d);
                        
                          $('tr').remove();   
                          $('p').hide();
                         $('table').addClass("tabela");
                         $('table').append(
                              '<tr>'+'<th>' + 'Nome' + '</th>' +
                              '<th>'+ 'Genero' + '</th>'+
                              '<th>'+ 'Temporada'+ '</th>' +
                              '<th>'+ 'Sinopse' + '</th>' +
                              '<th>'+ 'Faixa etaria' + '</th>'+
                              '<th>'+ 'Data de Lançamento' + '</th>'+
                              '<th>' + 'Elenco' + '</th>'+ 
                              '<th>' + 'Nota dos Usuarios' + '</th>'+ '</tr>'+
                              '<tr>' +  '<td>' + d.name +'</td>' + 
                              '<td>' + d.genre +'</td>' +
                              '<td>' + d.seasons +'</td>' +
                              '<td>' + d.synopsis +'</td>' +
                              '<td>' + d.age_range +'</td>' +
                              '<td>' + d.lauch_year +'</td>' +
                              '<td>' + d.main_cast +'</td>' + 
                              '<td>' + d.rating +'</td>' +                   

                              '</tr>'
                            ); 
                          $('select').prop('selectedIndex',0);

                      },
                      error: function(data) { 
                        $('p').show();
                        $('tr').remove();
                        $('p').html('Digite ou escolha uma opcao para a pesquisa');
                      }
                     


                  });

                }

               
            })




          });
</script>
     
      <script src="js/materialize.min.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</body>
</html>
        