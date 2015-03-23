<?php
session_start();
if(isset($_POST['submitpost'])){
    if(getimagesize($_FILES['selectfile'])){
        echo "please select an image";
    } else {
        $image = addslashes($_FILES['selectfile']['tmp_name']);
        $name = addslashes($_FILES['selectfile']['name']);
        $image = file_get_contents($image);
        $image = base64_encode($image);
        saveimage($name, $image);
    }
}

function saveimage($name, $image) {
    $CONN = mysqli_connect('localhost', 'root', '', 'blog');
    $sql = "INSERT INTO `blog_data`(`image_name`, `file`) VALUES ('$name','$image')";
    $result = mysqli_query($CONN, $sql);
    if($result){
        echo "image uploaded";
    } else {
        echo "image not uploaded";
    }
}
    function displayimage(){
    $CONN = mysqli_connect('localhost', 'root', '', 'blog');
    $sql = "SELECT `image_name`, `file` FROM `blog_data` image_name='$name' AND file='$image'";
    $result = mysqli_query($CONN, $sql);
    while($row = mysqli_fetch_array($result)) {
        echo "<img class='image' src='data:image;base64,".$row['file']."'>";
    }
}

?>