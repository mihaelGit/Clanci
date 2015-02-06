<?php 

if(isset($_GET["id"])){
    $id = $_GET["id"];
    
    
    $article = $articles->getArticle($id);
    
    if(sizeof($article) == 1){
        
        ?>
        <div id="articleForReview">
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
        <div id="forReviewForm">
            <form action="<?php echo $path;?>php/assignReviewer.php" method="post">
            <p class="formSelectReviewer">Select person to review article.</p>
            <input type="hidden" name="articles_id" value="<?php echo $article[0]["articles_id"]; ?>"/>
            <select name="reviewer">
                <?php foreach($reviewers as $x) {?>
                <option value="<?php echo $x["user_id"];?>"><?php echo $x["name"];?></option>
                <?php }?>
            </select>
            <input type="submit" value="Send to Review">
        </form>  
        </div>
        <?php
    }
    else{
        
    }
}

?>