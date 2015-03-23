<?php session_start(); ?>
<section class="login-screen">
    <div class="left-wall">
        <div class="login-info">
        </div>
    </div>
        <div class="right-wall">
            <div class="login-container">
                <form action="actions/login.php" method="post">
                    <input class="username" type="text" name="username" placeholder="Username">
                    <input class="password" type="password" name="password" placeholder="Password">
                    <button onclick="loginWall()" class="login-btn">Sign in</button>
                    <input type="button" class="register-btn" onclick="regWall()" value="Sign Up">
                </form>
            </div>
        </div>
</section>