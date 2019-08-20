<?php 
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
            <h1 class="pesquisa">Pesquisa</h1>
          <label>Séries:</label>
          <input type="text" name="Serie" id="serie" placeholder="pesquisar series" data-quantity="btnserie">
          <select name="select_genero" id="select">
          <option select>Genero</option>
            <?php foreach (genero() as $val): ?>
              <option value="<?= $val["genre"] ?>" ><?= $val["genre"] ?> </option>
            <?php endforeach ?>          
          </select>
      
          <input type="submit" id="btnserie" value="Pesquisar"  >

  
          <table>
            
          </table>
          <p><a href="login.php">Entrar</a></p>




 <script>


        $(function(){
            $('input[type=submit]').on('click',function(){
              
              let dados = $('#serie').serializeArray(); 
              let dados2 = $('select').serialize();
              if($('select').val() != 'Genero'){
                dados.push({name:'select_genero', value: $('select').val()} );
              }
              //console.log(dados);
              //console.log(dados);

              $.ajax({
                  type      : 'POST',
                  url       : 'pesq_serie.php',
                  data      : dados,
                  dataType  : 'html',
                  async: true,  
                success : function(txt){

                    //console.log(txt);

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

                      $('#serie').val(''); 
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



</body>
</html>
        