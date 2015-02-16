<?php 

if(isset($_GET["id"])){
    $id = $_GET["id"];
    
    
    $article = $articles->getArticle($id);
    
    if(sizeof($article) == 1){
        
        ?>
        <div id="articleMakeReview">
            <table>
                <tr><td class="info">Title:</td><td><?php echo $article[0]["title"]; ?></td></tr>
        <tr><td class="info">Author:</td><td><?php echo $article[0]["name"]; ?></td></tr>
        <tr><td class="info">Category:</td><td><?php echo $article[0]["categoryName"]; ?></td></tr>
        <tr><td class="info">File:</td><td><?php echo '<a href="'.$path.'articles/'.$article[0]["filePath"].'" target="_blank">'.$article[0]["filePath"].'</a>'; ?></td></tr>
        <tr><td class="info">Summary:</td><td><?php echo $article[0]["summary"]; ?></td></tr>
            </table>
        </div>
        <?php
        $reviewers = $users->getReviewers($article[0]["categories_id"]);
        ?>
        <div id="makeReviewForm">
            <form action="<?php echo $path;?>php/makeReview.php" method="post">
            <input type="hidden" name="articles_id" value="<?php echo $article[0]["articles_id"]; ?>"/>
            <p class="instructions">Article action:</p>
            <p><input type="radio" name="status" value="3" checked>Return for corrections</p>
            <p><input type="radio" name="status" value="4">Passed</p>
            <p class="instructions">Review:</p>
            <textarea name="review"></textarea>
            <input type="submit" value="Submit Review">
            </form>  
        </div>
        <?php
    }
    else{
        
    }
}

?>