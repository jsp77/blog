<?php
session_start();
$CONN = mysqli_connect('localhost','root','','blog');
$output = [];
if(isset($_POST)){
$username = $_POST['username'];
$password = $_POST['password'];
}
$sql = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
$results = mysqli_query($CONN, $sql);
//$rows = mysqli_num_rows($result);
    if(mysqli_num_rows($results) > 0) {
        $userinfo = mysqli_fetch_assoc($results);
        $_SESSION['userinfo'] = $userinfo;
        header('Location: ../includes/main.php');
    } 
    else {
        echo "
        <div style='width:300px;
        height:200px;
        border:1px solid black;
        border-radius:20px;
        font-family:happy monkey;
        margin:20% auto;
        text-align:center;
        border-top: 50px solid rgba(54,75,113,1);
        border-bottom: 50px solid rgba(54,75,113,1);'>
        <h3>incorrect username or password<h3>"."
        <p><a href='../index.php'>Click here to go back to login page</a></p>
        </div>";
    }

?>