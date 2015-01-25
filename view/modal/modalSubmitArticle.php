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
            <input type="text" name="title" placeholder="Title" value="<?php  ?>" />
            <textarea name="summary"></textarea>
            <select name="category">
            <?php foreach($catList as $optVal){?>
                <option value="<?php echo $optVal["id"] ?>"><?php echo $optVal["categoryName"] ?></option> 
            <?php } ?>
            </select>
            <input type="file" name="file" />
            <input type="submit" value="Send on Review" />
        </form>
    </div>
</div>
<?php
    unset($_SESSION["modalSubmitArticleError"]);
?>