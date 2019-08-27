<?php
require_once 'conect.php';

session_start();

$name = $_POST['name'];
$genre = $_POST['genre'];
$seasons = $_POST['seasons'];
$synopsis = $_POST['synopsis'];
$age_range = $_POST['age_range'];
$lauch_year = $_POST['lauch_year'];
$main_cast = $_POST['main_cast'];

$sql = "SELECT name FROM series WHERE :name";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':name',$name);
$stmt->execute();
$checaNome = $stmt->fetchAll();
var_dump($checaNome);
if (!$checaNome) {

	$sql = "INSERT INTO series(name,genre,seasons,synopsis,age_range,lauch_year,main_cast) VALUES (:name,:genre,:seasons,:synopsis,:age_range,:lauch_year,:main_cast)";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':genre',$genre);
	$stmt->bindParam(':seasons',$seasons);
	$stmt->bindParam(':synopsis',$synopsis);
	$stmt->bindParam(':age_range',$age_range);
	$stmt->bindParam(':lauch_year',$lauch_year);
	$stmt->bindParam(':main_cast',$main_cast);


	$resultado = $stmt->execute();
	if (!$resultado) {
		var_dump($stmt->erroInfo());
		exit();
	}else{
		$_SESSION['mensagem-sucess'] = 1;
		header('location:index.php');
	}

}

?>