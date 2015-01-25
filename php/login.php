<?php
/*****************************/
/* postavljanje login sesije */
/*****************************/
if($_POST){
    require_once 'class/db.php';
    require_once 'class/users.php';
    
    $db = new db();
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $test = new user($username, $password, $db->conn); // pkusa stvoriti usera

    if($test->isValid()){ // ako je uspio stvara sesiju i vraca korisnika natrag
        session_start();
        $_SESSION["user"] = $test->sessionData();
        header('Location: ../index.php');exit;
    } // treba dovrsiti neuspjesne loginove else{....
}
else{
    echo "Hmm something went wrong!";
}