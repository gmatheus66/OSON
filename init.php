<?php

include "conect.php";

function genero(){
    global $conn;
    $smt = $conn->prepare("SELECT DISTINCT genre FROM series");
    $smt -> execute();
    $dados = $smt -> fetchAll();
    return $dados;
}


?>