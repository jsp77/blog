<?php session_start(); ?>
<section class="registerform">
    <form id="register-form" action="actions/register.php" method="post">
        <div class="top-wall">
            <div class="form-top">
                <input class="reg-input-top" type="text" name="fullname" placeholder="fullname">
                <input class="reg-input-top" type="text" name="username" placeholder="username">
                <input class="reg-input-top" type="password" name="password" placeholder="password">
                <input class="reg-input-top" type="password" name="confirm_password" placeholder="Confirm password">

            </div>
        </div>
        <div class="bottom-wall">
            <div class="form-bottom">
                <input class="reg-input-bottom" type="text" name="email" placeholder="Email address">
                <button class="btn" type="submit" id="reg-btn" name="register-btn">Submit</button>
                <input class="btn" type="button" name="cancel-btn" onclick="regWall()" value="Cancel">
            </div>
        </div>
    </form>
    <div id="show-error"></div>
</section>
