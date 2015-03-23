<?php
session_start();
$output = [];
$error = [];
$uploadStatus = true;
if(isset($_POST)){
    $auther     = $_SESSION['userinfo']['username'];
    $matched_id  = $_SESSION['userinfo']['ID'];
    $title       = $_POST['title'];
    $timestamp   = time();
    $miniContent = $_POST['mini_content'];
    $content     = $_POST['content'];
 
    if($title == '') {
        $error['title'] = 'no title';
    }
    if($miniContent == '') {
        $error['mini_content'] = 'no mini content';
    }
    if($content == '') {
        $error['content'] = 'no content';
    }

    if(count($error) == 0) {
        $CONN = mysqli_connect('localhost','root','','blog');
            if(!$CONN) {
                die('Could not connect: '.mysqli_error());
            }
        $sql     = "INSERT INTO `blog_data`(`ID`, `auther`, `title`, `date`, `timestamp`, `content`, `mini_description`) ";
        $sql    .= "VALUES ('$matched_id', '$auther', '$title', '$timestamp', '$timestamp', '$content', '$miniContent')";
        $results = mysqli_query($CONN, $sql);
        if(mysqli_affected_rows($CONN) > 0) {
            $output['success'] = true; 
            $output['message'] = 'new post made!';
            
        } else {
            $output['success'] = false; 
            $output['message'] = 'posting failed!';
        }
    } else {
        $output['success'] = false;
        $output['message'] = 'errors found, failed to post';
        $output['error'] = $error;
        //header('Location: ../index.php');
    }
        echo json_encode($output); //test
}

?>