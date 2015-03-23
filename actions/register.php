<?php 
session_start();
//require('../blog_db.php');
$output = [];
$error = [];

    if(isset($_POST)) {
        $fullname   = $_POST['fullname'];
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $confirm_pw = $_POST['confirm_password'];
        $email      = $_POST['email'];
        $dateJoined = time();
        
        if($fullname == ''){
            $error['fullname'] = "fill out your full name<br>";
        }
        if($username == ''){
            $error['username'] = "fill out username<br>";
        }
        if($password == ''){
            $error['password'] = "fill out password<br>";
        }
        if($confirm_pw == '') {
            $error['confirm_password'] = "fill out confirmation password<br>";
        }
        else if($confirm_pw !== $password) {
            $error['password'] = 'passwords did not match';
        }
        if($email == ''){
            $error['email'] = "fill out your email";
        }
            if(count($error) == 0) {
            
            $CONN   = mysqli_connect('localhost', 'root', '', 'blog');
            $sql    = "INSERT INTO `users`(`full_name`, `username`, `password`, `email`, `joined_date`) ";
            $sql   .= "VALUES ('$fullname', '$username', '$password', '$email', $dateJoined)";
            $result = mysqli_query($CONN, $sql);

            if(mysqli_affected_rows($CONN) > 0) {
                $output['success'] = true; 
                $output['message'] = 'register complete!';
                
                header('Location: ../includes/main.php');
                }
                else {
                    $output['success'] = false; 
                    $output['message'] = 'registration failed!';
                }
            }
            else {
                $output['success'] = false;
                $output['message'] = 'errors found, add failed';
                $output['error'] = $error;
                header('Location: ../index.php');
            }
        //echo json_encode($output); //test
        }

?>