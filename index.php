<?php 
include "conect.php";


$serie = $_POST["Serie"];
$select = $_GET["select_genero"];

var_dump($select);


if($select == "Genero"){
    header('HTTP/1.1 500 Internal Server Booboo');
    header('Content-Type: application/json; charset=UTF-8');
    echo die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
    exit();
}
if(!empty($select) && !empty($serie)){

    $result = $conn -> prepare("SELECT series.id, series.name, series.genre, series.seasons, series.synopsis, series.age_range, series.lauch_year, series.main_cast, CAST(AVG(note_serie) AS DECIMAL(10,2)) as rating
    FROM series ,users_series WHERE series.id = users_series.serie_id AND series.genre = ? AND  series.name = ? GROUP BY serie_id");
    $result -> bindParam(1,$select);
    $result -> bindParam(2, $select);
    $result -> execute();
    $ser = $result -> fetch();
    if(!isset($ser)){
        echo json_encode($ser);
    }else{
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
    }
    exit();
    
}

if(isset($serie) && empty($select)){

//Search Series by name
    $result = $conn -> prepare("SELECT series.id, series.name, series.genre, series.seasons, series.synopsis, series.age_range, series.lauch_year, series.main_cast, CAST(AVG(note_serie) AS DECIMAL(10,2)) as rating
    FROM series ,users_series WHERE series.id = users_series.serie_id AND lower(series.name) = lower(?) GROUP BY serie_id");
    $result -> bindParam(1,$serie);
    $result -> execute();
    $ser = $result -> fetch();
    echo json_encode($ser);
    exit();


}
if(isset($select) && empty($serie)){

    $result = $conn -> prepare("SELECT series.id, series.name, series.genre, series.seasons, series.synopsis, series.age_range, series.lauch_year, series.main_cast, CAST(AVG(note_serie) AS DECIMAL(10,2)) as rating
    FROM series ,users_series WHERE series.id = users_series.serie_id AND lower(series.genre) = lower(?) GROUP BY serie_id");
    $result -> bindParam(1,$select);
    $result -> execute();
    $ser = $result -> fetch();
    
    echo json_encode($ser);
    //var_dump($ser);
    exit();
    
}


//echo json_encode($ser);



?>