<?php
session_start();
if(!isset($_SESSION["user"])){
    header('Location: index.php');exit;
}
require 'view/header.php'; 

switch ($_SESSION["user"]["role"]){
    case 1: // ADMIN
        echo "<p>Admin</p>";
        break;
    case 2: // AUTHOR
        include 'view/authorOptions.php';
        break;
    case 3: // REVIEWER
        echo "<p>Reviewer</p>";
        break;
    default: break;
}


require 'view/footer.php'; ?>