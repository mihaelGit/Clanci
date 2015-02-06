<div id="outerWrapper">
<div id="wrapper">
<!--********-->
<!-- HEADER --> 
<!--********-->
<header>
    <div id="pageName"><h1>Logo / Title</h1></div>

    <div id="regLog" class="">
        <?php if(isset($_SESSION["user"])){?>
        <p><i class="fa fa-user"></i> <?php echo "Hello ".$_SESSION["user"]["firstName"]; ?></p>
        <a class="options" href="<?php echo $path; ?>php/logout.php"><i class="fa fa-key"></i> LogOut</a>
        <a class="options" href="<?php echo $path; ?>options"><i class="fa fa-pencil-square-o"></i> Options</a>    
        <?php }
        else{?>
        <ul>
            <li><a href="#" onclick="modalOn('modalLogin')">Log In</a></li>
            <li><a href="#" onclick="modalOn('modalRegister')">Register</a></li>
        </ul>
        <?php } ?>
    </div>
</header> 
<!--*************************************************************************-->
<!--*****-->
<!-- NAV -->
<!--*****-->
<nav>
    <ul id="navOptions">
        <li><a href="<?php echo $path; ?>home"><i class="fa fa-home" style="font-size: 0.75em;"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-list" style="font-size: 0.75em;"></i> Categories</a></li>
        <li><a href="#"><i class="fa fa-search" style="font-size: 0.75em;"></i> Search</a></li>
        <li><a href="#"><i class="fa fa-envelope-o" style="font-size: 0.75em;"></i> Contact</a></li>
        <li><a href="#"><i class="fa fa-question" style="font-size: 0.75em;"></i> FAQ</a></li>
    </ul>
    <div id="menuBar" onclick="go();"> <i id="menuIcon" class="fa fa-bars" style="font-size: 20px; color: white;"></i> </div>
</nav>
<!--*************************************************************************-->