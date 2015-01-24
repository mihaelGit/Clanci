<?php

if($_POST){
    require_once 'class/db.php';
    require_once 'class/users.php';
    
    $db = new db();
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $test = new user($username, $password, $db->conn);

    if($test->isValid()){
        session_start();
        $_SESSION["user"] = $test->sessionData();
       // print_r($_SESSION["user"]);
        header('Location: ../index.php');exit;
    }
}
else{
    echo "Hmm something went wrong!";
}