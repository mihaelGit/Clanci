<div id="modalSubmitArticle" style="<?php if(isset($_SESSION["SubmitArticleError"])){echo "display:block";} ?>">
    <div class="modalCover" onclick="modalCancel('modalSubmitArticle')"></div>
    <div class="modalContent">
        <form action="php/uploadArticle.php" name="submitArticleForm" method="post" enctype="multipart/form-data">
            <p class="formError">
                <?php 
                    if(isset($_SESSION["SubmitArticleError"]["empty"])){
                        echo $_SESSION["SubmitArticleError"]["empty"];
                    } 
                ?>
            </p>
            <p>
                <?php 
                    if(isset($_SESSION["SubmitArticleError"]["title"])){
                        echo $_SESSION["SubmitArticleError"]["title"];
                    } 
                ?>
            </p>
            <input type="text" name="title" placeholder="Title" value="<?php 
            if(isset($_SESSION["SubmitArticleData"]["title"])){
                echo $_SESSION["SubmitArticleData"]["title"];} 
            ?>" />
            <textarea name="summary"><?php 
            if(isset($_SESSION["SubmitArticleData"]["summary"])){
                echo $_SESSION["SubmitArticleData"]["summary"];} 
            ?></textarea>
            <select name="category">
            <?php foreach($catList as $optVal){?>
                <option value="<?php echo $optVal["id"] ?>" <?php 
            if(isset($_SESSION["SubmitArticleData"]["category"]) && ($_SESSION["SubmitArticleData"]["category"]==$optVal["id"])){
                echo "selected";} 
            ?>><?php echo $optVal["categoryName"] ?></option> 
            <?php } ?>
            </select>
            <input type="file" name="file" />
            <input type="submit" value="Send on Review" />
        </form>
    </div>
</div>
<?php
    unset($_SESSION["modalSubmitArticleError"]);
    unset($_SESSION["SubmitArticleData"]);
?>