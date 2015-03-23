<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../Assets/main.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../Assets/external/jquery.min.js"></script>
    <script src="../Assets/main.js"></script>
    <title>Blog</title>
</head>
<body>
    <div id="body">
<header>
    <section class="user-logout">
        <ul>
            <li>Welcome</li>
            <li class="user-info" onclick="showProfile()"><?php  echo $_SESSION['userinfo']['username']; ?></li>
            <li>!</li>
            <li class="thumbnail_pic"><i class="fa fa-user fa-2x"></i></li>
            <li class="logout"><a href="../actions/logout.php">Logout</a></li>
        </ul>
    </section>
</header>
<div class="main_body">
        <div class="user_profile">
    
        <div class="pic"><img asrc="../Assets/images/propic.jpg"></div>
        </div>
    
        <div class="nav_menu">
        <span id="newPost" onclick="newPostDisplay()">create new post</span>
        <span class="displayPost" onclick="displayArea()">details</span>
        <span class="">view all photos</span>
    </div>
        <section class="main_content">
            <div class="input_area">
                <section class="new_dropdown">
                    <form action="../actions/newPost.php" method="post">
                        <input class="" id="title" type="text" name="title" placeholder="title">
                        <textarea id="mini_desc" type="text" name="mini_content" placeholder="brief description"></textarea>
                        <textarea id="details" type="text" name="content" placeholder="full description"></textarea>
                        <input class="select-btn" type="file" name="selectfile">
                        <button class="btn" type="button" id="createPost" name="submitpost">create</button>
                        <button class="btn" type="button" onclick="newPostDisplay()">cancel</button>
                    </form>
                </section>
            </div>
            <section class="display_window">
                <div class="display_content"></div>
            </section>
        </section>
    </div>
<div class="footer-nav"></div>
<footer>
    <div class="footer">
        <div class="icons">
            <i class="fa fa-lg fa-rss"></i>
            <i class="fa fa-lg fa-facebook"></i>
            <i class="fa fa-lg fa-twitter"></i>
            <i class="fa fa-lg fa-instagram"></i>
            <i class="fa fa-lg fa-google-plus-square"></i>
            <i class="fa fa-lg fa-youtube-play"></i>  
        </div>
    </div>
</footer>
</div>
</body>
</html>