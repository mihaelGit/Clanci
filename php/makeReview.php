<?php
if($_POST){
    
    require 'class/db.php';
    $db = new db(); 
    
    require 'class/article.php';
    $article = new article($db->conn);
    
    $articles_id = $_POST["articles_id"];
    $status = $_POST["status"];
    $review = $_POST["review"];
    
    if($article->submitReview($articles_id, $status, $review)){
        header('Location: ../options'); exit;
    }
    else{
        echo 'There was an error!';
    }
    
}
else{
    echo 'How did you get here :?';
}