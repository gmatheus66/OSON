<?php 
include "Banco/conect.php";

$serie = $_POST["Serie"];


$result = $conn -> prepare("SELECT name,genre,seasons,synopsis,age_range,lauch_year, main_cast FROM Series WHERE name = ?");
$result -> bindParam(1,$serie);
$result -> execute();
$ser = $result -> fetch();


?>