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
    
    $users = new users($db->conn);
    $users->login($username, $password); // pkusa stvoriti usera

    if($users->isValid()){ // ako je uspio stvara sesiju i vraca korisnika natrag
        session_start();
        $_SESSION["user"] = $users->sessionData();
        header('Location: ../home');exit;
    } // treba dovrsiti neuspjesne loginove else{....
}
else{
    echo "Hmm something went wrong!";
}