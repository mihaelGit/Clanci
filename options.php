<?php
session_start();
if(!isset($_SESSION["user"])){
    header('Location: index.php');exit;
}
require 'view/header.php'; 

switch ($_SESSION["user"]["role"]){
    case 1: 
        echo "<p>Admin</p>";
        break;
    case 2: 
        echo "<p>Author</p>";
        break;
    case 3: 
        echo "<p>Reviewer</p>";
        break;
    default: break;
}


require 'view/footer.php'; ?>