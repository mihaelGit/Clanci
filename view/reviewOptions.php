<div id="reviewBar">
    <ul>
        <li  class="selected" onclick="tabPick2('review',this)">For review</li>
        <li onclick="tabPick2('corrections', this)">Sent for corrections</li>
        <li onclick="tabPick2('finished', this)">Passed articles</li>
    </ul>
    <div id="review">
    
        <?php 
        $articleList = $articles->articlesForReviewer($_SESSION["user"]["id"]);
        print_r($articleList);
        ?>
    
    </div>
    <div id="corrections"><p>Sent for corrections</p></div>
    <div id="finished"><p>Passed articles</p></div>
</div>
