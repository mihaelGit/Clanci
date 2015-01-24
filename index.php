<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <meta name="viewport" content="width-device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/style1.css" type="text/css" />
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!--************-->
<!-- JAVASCRIPT -->
<!--************-->
        <script type="text/javascript">
            function modalOn(idName){
                document.getElementById(idName).style.display = 'block';
            }
            function modalCancel(idName){
                document.getElementById(idName).style.display = 'none';
            }
            function go(){
                if(document.getElementById("navOptions").className != "showing"){
                    document.getElementById("navOptions").className = "showing";
                    document.getElementById("menuIcon").className = "fa fa-bars fa-rotate-90";
                }
                else{
                    document.getElementById("navOptions").className = "";
                    document.getElementById("menuIcon").className = "fa fa-bars";
                }
            }

        </script>
<!--*************************************************************************-->
    </head>
    <body>
<!--*******-->
<!-- MODAL -->
<!--*******-->
        <div id="modalLogin">
            <div class="modalCover" onclick="modalCancel('modalLogin')"></div>
            <div class="modalContent">
                <form action="php/login.php" name="loginForm" method="post">
                    <input type="text" name="username" placeholder="Username" />
                    <input type="password" name="password" placeholder="Password"/>
                    <input type="submit" value="Log In" />
                </form>
            </div>
        </div>

        <div id="modalRegister">
            <div class="modalCover" onclick="modalCancel('modalRegister')"></div>
            <div class="modalContent">
                <form action="" name="registerForm" method="post">
                    <input type="text" name="firstName" placeholder="First Name" />
                    <input type="text" name="lastName" placeholder="Last Name" />
                    <input type="email" name="mail" placeholder="e-mail" />
                    <input type="text" name="username" placeholder="Username" />
                    <input type="password" name="password" placeholder="Password"/>
                    <input type="password" name="password" placeholder="Repeat Password"/>
                    <input type="submit" value="Register" />
                </form>
            </div>
        </div>

<!--*************************************************************************-->
        <div id="wrapper">
<!--********-->
<!-- HEADER --> 
<!--********-->
            <header>
                <div id="pageName"><h1>Logo / Title</h1></div>
                
                <div id="regLog" class="">
                    <?php if(isset($_SESSION["user"])){?>
                    <p><i class="fa fa-user"></i> <?php echo "Hello ".$_SESSION["user"]["firstName"]; ?></p>
                    <a class="options" href="php/logout.php"><i class="fa fa-key"></i> LogOut</a>
                    <a class="options" href="#"><i class="fa fa-pencil-square-o"></i> Options</a>    
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
                    <li><a href="#"><i class="fa fa-home" style="font-size: 0.75em;"></i> Home</a></li>
                    <li><a href="#"><i class="fa fa-list" style="font-size: 0.75em;"></i> Categories</a></li>
                    <li><a href="#"><i class="fa fa-search" style="font-size: 0.75em;"></i> Search</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o" style="font-size: 0.75em;"></i> Contact</a></li>
                    <li><a href="#"><i class="fa fa-question" style="font-size: 0.75em;"></i> FAQ</a></li>
                </ul>
                <div id="menuBar" onclick="go();"> <i id="menuIcon" class="fa fa-bars" style="font-size: 20px; color: white;"></i> </div>
            </nav>
<!--*************************************************************************-->
<!--*********-->
<!-- CONTENT -->
<!--*********-->
            <div id="contentNew">
                <?php for($i = 0; $i < 20 ; $i++){?>
                    <div class="article">
                    <h2>Article title</h2>
                    <p>Author: FirstName LastName</p>
                    <p>Published: 21.12.2015</p>
                </div>
                <?php } ?>     
            </div>
<!--*************************************************************************-->
        </div><!-- Wrapper ends -->
<!--********-->
<!-- FOOTER -->
<!--********-->
        <footer>
            <p>Copyright &copy; 2015 <a href="#">clickhere.com</a></p>
        </footer>
<!--*************************************************************************-->
    </body>
</html>
