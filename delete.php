<?php
require 'connect.inc.php';
require 'core.inc.php';

$post_id= $_GET['postid'];

$query= "DELETE FROM posts WHERE id=".$post_id;

if($query_run = mysqli_query($db,$query)){
        
}else{
    echo "Some error Occured";
}

header('location: posts.php');
?>