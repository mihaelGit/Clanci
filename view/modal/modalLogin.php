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