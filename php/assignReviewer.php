<?php
if($_POST){
    
    require 'class/db.php';
    $db = new db(); 
    
    require 'class/article.php';
    $article = new article($db->conn);
    
    $userID = $_POST["reviewer"];
    $articleID = $_POST["articles_id"];
    
    if($article->assignReviewer($articleID, $userID)){
        if($article->statusUpdate($articleID, 2)){
        header('Location: ../options'); exit;
        }
    }
    else{
        echo 'There was an error!';
    }
    
}
else{
    echo 'How did you get here :?';
}