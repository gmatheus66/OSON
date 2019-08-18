<?php 
include "conect.php";

$serie = $_POST["Serie"];


$result = $conn -> prepare("SELECT name,genre,seasons,synopsis,age_range,lauch_year, main_cast FROM series WHERE name = ?");
$result -> bindParam(1,$serie);
$result -> execute();
$ser = $result -> fetch();

echo json_encode($ser);

?>