<?php
session_start();
include "conect.php";
include 'funcs/init.php';
 
$email = addslashes($_POST["email"]) ?? "";
$password = addslashes($_POST["password"]) ?? "";
$cpf = addslashes($_POST["email"]) ?? "";

$password = md5($password);

if (empty($email) || empty($password)){
  $_SESSION['preencher']= true;
    redirect('login.php');
    exit;
}


try{
    $stmt = $conn-> prepare("SELECT * FROM users WHERE email = :email OR cpf = :cpf"); 
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':cpf', $cpf);

    $stmt->execute();
    $users = $stmt->fetchAll();
    
    $user = $users[0];

    if (($user['email']==$email && $user['password']!=$password) || ($user['cpf']==$cpf && $user['password']!=$password)) {
      $_SESSION['senha_incorreta'] = true;
        redirect('login.php');
    }elseif(($user['email']!=$email && $user['password']!=$password) || ($user['cpf']!=$cpf && $user['password']!=$password)){
      $_SESSION['nao_cadastrado'] = true;
        redirect('login.php');
      }else{
        
        $_SESSION['logged_in'] = true;
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['cpf'] = $user['cpf'];
        $_SESSION['username'] = $user['username'];
    }
}catch(PDOException $ex){
    $ex -> getmessage();
} 
    header('location: index.php');





