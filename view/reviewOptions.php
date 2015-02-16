<div id="reviewBar">
    <ul>
        <li  class="selected" onclick="tabPick2('review',this)">For review</li>
        <li onclick="tabPick2('corrections', this)">Sent for corrections</li>
        <li onclick="tabPick2('finished', this)">Passed articles</li>
    </ul>
    <div id="review">
        <?php 
        $articleList = $articles->articlesForReviewer($_SESSION["user"]["id"]);
        
        if(sizeof($articleList) > 0){
        ?>
        <table><tr><th>Title</th><th>File</th><th>Summary</th><th></th></tr>
        <?php
        foreach($articleList as $x){
        ?>
            <tr class="data">
                <td><?php echo $x['title'];?></td>
                <td><a href="<?php echo $path."articles/".$x['filePath'];?>" target="_blank"><?php echo $x['filePath'];?></a></td>
                <td><?php echo $x['summary'];?></td>
                <td><a href="makeReview/<?php echo $x['articles_id'];?>">REVIEW</a></td>
            </tr>
        <?php 
        } ?>
        </table>
        <?php }
        
        else{
        ?>
        <p>There is no articles assigned for review.</p>
        <?php } ?>
    </div>
    <div id="corrections">
        <?php 
        $articleList = $articles->returnedArticlestOfReviewer($_SESSION["user"]["id"]);
        
        if(sizeof($articleList) > 0){
        ?>
        <table><tr><th>Title</th><th>File</th><th>Summary</th></tr>
        <?php
        foreach($articleList as $x){
        ?>
            <tr class="data">
                <td><?php echo $x['title'];?></td>
                <td><a href="<?php echo $path."articles/".$x['filePath'];?>" target="_blank"><?php echo $x['filePath'];?></a></td>
                <td><?php echo $x['summary'];?></td>
            </tr>
        <?php 
        } ?>
        </table>
        <?php }
        
        else{
        ?>
        <p>There are no articles on corrections.</p>
        <?php } ?>    
    </div>
    <div id="finished">
        <?php 
        $articleList = $articles->passedArticlestOfReviewer($_SESSION["user"]["id"]);
        
        if(sizeof($articleList) > 0){
        ?>
        <table><tr><th>Title</th><th>File</th><th>Summary</th></tr>
        <?php
        foreach($articleList as $x){
        ?>
            <tr class="data">
                <td><?php echo $x['title'];?></td>
                <td><a href="<?php echo $path."articles/".$x['filePath'];?>" target="_blank"><?php echo $x['filePath'];?></a></td>
                <td><?php echo $x['summary'];?></td>
            </tr>
        <?php 
        } ?>
        </table>
        <?php }
        
        else{
        ?>
        <p>No passed articles.</p>
        <?php } ?>  
    </div>
</div>
