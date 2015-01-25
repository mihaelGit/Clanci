<?php 
/*************************************************************************************/
/* Prozor za prijavu clanka -> salje na php/uploadArticle.php ako dodje do greske 
   $_SESSION["SubmitArticleError"] i $_SESSION["SubmitArticleData"] se vracaju 
   za dodatana objasnjenja i povrat unesenih informacija                             */
/*************************************************************************************/
?>
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
            <p class="segmentError">
                <?php 
/*********/
/* TITLE */
/**********************************************************************************************************************/
                    if(isset($_SESSION["SubmitArticleError"]["title"])){
                        echo $_SESSION["SubmitArticleError"]["title"];
                    } 
                ?>
            </p>
            <input type="text" name="title" placeholder="Title" value="<?php 
            if(isset($_SESSION["SubmitArticleData"]["title"])){
                echo $_SESSION["SubmitArticleData"]["title"];} 
            ?>" />
            <p class="segmentError">
                <?php 
/***********/
/* SUMMARY */
/**********************************************************************************************************************/                
                    if(isset($_SESSION["SubmitArticleError"]["summary"])){
                        echo $_SESSION["SubmitArticleError"]["summary"];
                    } 
                ?>
            </p>
            <textarea name="summary"><?php 
            if(isset($_SESSION["SubmitArticleData"]["summary"])){
                echo $_SESSION["SubmitArticleData"]["summary"];} 
            ?></textarea>
            <p class="segmentError">
                <?php 
/************/
/* CATEGORY */
/**********************************************************************************************************************/               
                    if(isset($_SESSION["SubmitArticleError"]["category"])){
                        echo $_SESSION["SubmitArticleError"]["category"];
                    } 
                ?>
            </p>
            <select name="category">
                <option selected value="x">Category</option>
            <?php foreach($catList as $optVal){ /* $catList je dobiven sa options.php mozda bi bilo dobro staviti negdje drugdje? */ ?>
                <option value="<?php echo $optVal["id"] ?>" <?php 
            if(isset($_SESSION["SubmitArticleData"]["category"]) && ($_SESSION["SubmitArticleData"]["category"]==$optVal["id"])){
                echo "selected";} 
            ?>><?php echo $optVal["categoryName"] ?></option> 
            <?php } ?>
            </select>
            <p class="segmentError">
                <?php 
/********/
/* FILE */
/**********************************************************************************************************************/                
                    if(isset($_SESSION["SubmitArticleError"]["file"])){
                        echo $_SESSION["SubmitArticleError"]["file"];
                    } 
                ?>
            </p>
            <input type="file" name="file" />
            <input type="submit" value="Send on Review" />
        </form>
    </div>
</div>
<?php
/***************************/
/* Brisanje sesija s
   upozorenjima i podacima */
/***************************/
    unset($_SESSION["SubmitArticleError"]);
    unset($_SESSION["SubmitArticleData"]);
?>