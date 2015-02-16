<div id="leftBar">
    <div id="uploadBox" onclick="modalOn('modalSubmitArticle')"><i class="fa fa-upload"></i> <br/>Submit new Article</div>
    <div id="newsBox"><h3>News!</h3></div>
</div>
<div id="rightBar">
    <ul>
        <li  class="selected" onclick="tabPick('published',this)">Published</li>
        <li onclick="tabPick('underReview', this)">Under Review</li>
        <li onclick="tabPick('returned', this)">Returned for corrections</li>
    </ul>
    <div id="published"><p>Tab for published</p></div>
    <?php
        $articleList = $articles->getArticlesUnderReview($_SESSION['user']['id']);
    ?>
    <div id="underReview">
        <?php 
            if(sizeof($articleList) > 0){ ?>
        <table>
            <tr><th>Title</th><th>File</th><th>Submit time</th></tr>
        <?php
                foreach($articleList as $x){ ?>
            <tr class="data">
                <td><?php echo $x["title"]; ?></td>
                <td><?php echo '<a href="articles/'.$x["filePath"].'" target="_blank">'.$x["filePath"].'</a>'; ?></td>
                <td><?php echo $x["submitTime"]; ?></td>
            </tr>
        <?php }?>
        </table>    
        <?php  }          
            else{ ?>
        <p>No articles under review.</p>
        <?php } ?>
    </div>
    <div id="returned"><p>Tab for returned for correction</p></div>
    
</div>
