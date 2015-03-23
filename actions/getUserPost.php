<?php 
session_start();
if(isset($_SESSION)){
    $auther     = $_SESSION['userinfo']['username'];
    $matched_id  = $_SESSION['userinfo']['ID'];
    $CONN = mysqli_connect('localhost','root','','blog');
    $sql  = "SELECT `ID`, `auther`, `title`, `date`, `timestamp`, `content`, `mini_description`, `image_name`, `file` ";
    $sql .= "FROM blog_data WHERE ID='$matched_id' AND auther='$auther'";
    $results = mysqli_query($CONN, $sql);
    $output = [];

    if(mysqli_num_rows($results) > 0) {
            while($row = mysqli_fetch_assoc($results)) {
                $fetch_data[] = "
                <div class='post_container' data-id=".$row['auther'].">
                        <span class='post-image'>
                        <img class='image' src='data:image;base64,".$row['file']."'>
                        </span>
                    <div class='post_info'>
                        <span class='post-title'>Title: ".$row['title']."</span>
                        <span class='post-date'>Date Posted: ".date('m-d-Y')."</span>
                        <span class='post-mini_content'>".nl2br($row['mini_description'])."</span>
                        <input class='post-select' name='select-pic' type='file'>
                        <button class='post-upload'name='upload' type='button' type='button'>Upload</button>
                        <button class='post-edit' name='edit' type='button'>edit</button>
                        <button class='post-remove' name='remove' type='button'>delete</button>
                    </div>
                    <span class='post-content'>".nl2br($row['content'])."</span>
                </div>";
            }
            $html=$fetch_data; 
            $output=['success'=>true, 'html'=>$html]; 
    } else {
        $output=['success'=>false, 'message'=>'No records!']; 
    }
    echo json_encode($output); 
}

?>