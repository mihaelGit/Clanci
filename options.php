<?php
session_start();
if(!isset($_SESSION["user"])){
    header('Location: index.php');exit;
}

require_once 'php/class/db.php';
require_once 'php/class/users.php';
require_once 'php/class/categories.php';
    
$db = new db();
$categoriesObject = new categories($db->conn);
$catList = $categoriesObject->getSelectList();

require 'view/htmlHead.php';

switch ($_SESSION["user"]["role"]){
    case 1: // ADMIN
        echo "<p>Admin</p>";
        break;
    case 2: // AUTHOR
        require 'view/modal/modalSubmitArticle.php';
        require 'view/header.php';
        require 'view/authorOptions.php';
    break;
    case 3: // REVIEWER
        echo "<p>Reviewer</p>";
        break;
    default: break;
}


require 'view/footer.php'; 
?>