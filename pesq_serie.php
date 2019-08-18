<?php 
include "conect.php";

$serie = $_POST["Serie"];


//Search Series by name
$result = $conn -> prepare("SELECT series.id, series.name, series.genre, series.seasons, series.synopsis, series.age_range, series.lauch_year, series.main_cast, CAST(AVG(note_serie) AS DECIMAL(10,2)) as rating
FROM series ,users_series WHERE series.id = users_series.serie_id AND series.name = ? GROUP BY serie_id");
$result -> bindParam(1,$serie);
$result -> execute();
$ser = $result -> fetch();

var_dump($ser);
echo json_encode($ser);

?>