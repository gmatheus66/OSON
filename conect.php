<?php 

$dbname = "pep20192series";
$user = "pep20192";
$passw = "pep20192";

try {
	$conn = new PDO("mysql:host=localhost;dbname=".$dbname,$user, $passw);
	// echo"deu bom";
} 
 catch (PDOException $e) {
	$e-> getMessage();
	// echo "ERROR";
}
?>