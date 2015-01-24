<div id="modalSubmitArticle">
    <div class="modalCover" onclick="modalCancel('modalSubmitArticle')"></div>
    <div class="modalContent">
        <form action="php/uploadArticle.php" name="submitArticleForm" method="post" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Title" />
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