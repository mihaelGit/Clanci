<div id="adminBar">
    <ul>
        <li  class="selected" onclick="tabPick1('publish',this)">Publish</li>
        <li onclick="tabPick1('forReview', this)">Send on review</li>
        <li onclick="tabPick1('promote', this)">Promote to reviewer</li>
        <li onclick="tabPick1('members', this)">Members</li>
        <li onclick="tabPick1('articles', this)">Articles</li>
    </ul>
    <div id="publish"><p>Tab for published</p></div>
<!--*****************************-->
<!-- Clanci za slanje recenzentu -->
<!--*************************************************************************-->
    <div id="forReview">
        <?php 
            $articleList = $articles->getArticlesForReview();
            
            if(sizeof($articleList)>0){?>
        <table><tr><th>Author</th><th>Title</th><th>Category</th><th></th></tr>
        <?php
                foreach ($articleList as $x){
        ?>
            <tr class="data">
                <td><?php echo $x['name'];?></td>
                <td><?php echo $x['title'];?></td>
                <td><?php echo $x['categoryName'];?></td>
                <td><a href="forReview/<?php echo $x['id'];?>">SEND ON REVIEW</a></td>
            </tr>
        <?php
                }
        ?>
            </table>
        <?php
            }
            else{
        ?>
        <p>There is no new articles for review.</p>
        <?php } ?>
    </div>
<!--*************************************************************************-->
<!--**********************-->
<!-- Promote u recenzenta -->
<!--*************************************************************************-->
    <div id="promote">
        <?php 
        $usersList = $users->getUsersForPromote();
        if(sizeof($usersList)>0){?>
        <table><tr><th>First Name</th><th>Last Name</th><th>Username</th><th>E-mail</th><th>ID</th></tr>
        <?php
                foreach ($usersList as $x){
        ?>
            <tr class="data">
                <td><?php echo $x['firstName'];?></td>
                <td><?php echo $x['lastName'];?></td>
                <td><?php echo $x['username'];?></td>
                <td><?php echo $x["mail"]; ?></td>
                <td><?php echo $x['id'];?></td>
            </tr>
        <?php
                }
        ?>
            </table>
        <?php
            }
            else{
        ?>
        <p>There is no users at the moment.</p>
        <?php } ?>
    </div>
<!--**************-->
<!-- Svi korisnci -->
<!--*************************************************************************-->
    <div id="members">
        <?php 
        $usersList = $users->getAllUsers();
        if(sizeof($usersList)>0){?>
        <table><tr><th>First Name</th><th>Last Name</th><th>Username</th><th>E-mail</th><th>Role</th><th>ID</th></tr>
        <?php
                foreach ($usersList as $x){
        ?>
            <tr class="data">
                <td><?php echo $x['firstName'];?></td>
                <td><?php echo $x['lastName'];?></td>
                <td><?php echo $x['username'];?></td>
                <td><?php echo $x["mail"]; ?></td>
                <td><?php echo $x['role'];?></td>
                <td><?php echo $x['id'];?></td>
            </tr>
        <?php
                }
        ?>
            </table>
        <?php
            }
            else{
        ?>
        <p>There is no users at the moment.</p>
        <?php } ?>
        
    </div>
<!--************-->
<!-- Svi clanci -->
<!--*************************************************************************-->
    <div id="articles">
        <?php 
            $articleList = $articles->getAllArticles();
            
            if(sizeof($articleList)>0){?>
        <table><tr><th>Author</th><th>Title</th><th>Category</th><th>File</th><th>Status</th><th>ID</th></tr>
        <?php
                foreach ($articleList as $x){
        ?>
            <tr class="data">
                <td><?php echo $x['name'];?></td>
                <td><?php echo $x['title'];?></td>
                <td><?php echo $x['categoryName'];?></td>
                <td><?php echo '<a href="'.$path.'articles/'.$x["filePath"].'" target="_blank">'.$x["filePath"].'</a>'; ?></td>
                <td><?php echo $x['status'];?></td>
                <td><?php echo $x['id'];?></td>
            </tr>
        <?php
                }
        ?>
            </table>
        <?php
            }
            else{
        ?>
        <p>There is no articles at the moment.</p>
        <?php } ?>
    </div>
<!--*************************************************************************-->
</div>
