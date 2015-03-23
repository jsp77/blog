<?php
session_start();
$CONN = mysqli_connect('localhost','root','','blog');
$output = [];
if(isset($_POST)){
$username = $_POST['username'];
$password = $_POST['password'];
}
//$cleanuser=strip_tags(trim($username));
//$cleanpass=mysqli_real_escape_string($conn, $password);
$sql = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
$results = mysqli_query($CONN, $sql);
//$rows = mysqli_num_rows($result);
    if(mysqli_num_rows($results) > 0) {
        $userinfo = mysqli_fetch_assoc($results);
        $_SESSION['userinfo'] = $userinfo;
        header('Location: ../includes/main.php');
    } 
    else {
        echo "<div class='show-error'><h3>Invalid username/password...<h3>"."<p><a href='../index.php'>GO BACK</a></p></div>";
    } 

?>