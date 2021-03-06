<?php
/*****************************************************************************/
/* Skripta za opcije korisnika. Svakoj vrsti se prikazuju pripadajuce opcije */
/*****************************************************************************/
session_start();// ovaj dio bi trebalo dodati na svaku stranicu na koju se dolazi kao korisnik!!!!! napraviti funkciju?
if(!isset($_SESSION["user"])){
    header('Location: home');exit;
}

require_once 'php/class/db.php';
require_once 'php/class/article.php';
require_once 'php/class/users.php'; // cemu ovo?
require_once 'php/class/categories.php';
   
// BAZA 
$db = new db();
// KORISNICI 
$users = new users($db->conn);
// CLANCI
$articles = new article($db->conn);
// KATEGORIJE
$categoriesObject = new categories($db->conn);
$catList = $categoriesObject->getSelectList(); // dobiva listu kategorija za option value mozda prebaciti?

require 'view/htmlHead.php';

switch ($_SESSION["user"]["role"]){
    case 1: // ADMIN
        require 'view/header.php';
        require 'view/adminOptions.php';
        break;
    case 2: // AUTHOR
        require 'view/modal/modalSubmitArticle.php';
        require 'view/header.php';
        require 'view/authorOptions.php';
    break;
    case 3: // REVIEWER
        require 'view/header.php';
        require 'view/reviewOptions.php';
        break;
    default: break;
}

require 'view/footer.php'; 
?>