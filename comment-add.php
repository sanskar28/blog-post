<?php

//add_comment.php

require 'connect.inc.php';
require 'core.inc.php';
$postid = $_GET['id'];

$name = getfield($db,'firstname');
$name .= " ";
$name.= getfield($db,'lastname');

$userid= getfield($db,'user_id');

$connect = new PDO('mysql:host=localhost:3308;dbname=like_dislike', 'root', '');



$error = '';
$comment_name = '';
$comment_content = '';



if(empty($_POST["comment_content"]))
{
 $error .= '<p class="text-danger">Comment is required</p>';
}
else
{
 $comment_content = $_POST["comment_content"];
}

if($error == '')
{
 $query = "
 INSERT INTO tbl_comment 
 (parent_comment_id, comment, comment_sender_name , topic_id,user_id) 
 VALUES (:parent_comment_id, :comment, :comment_sender_name ,".$postid.",".$userid." )
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':parent_comment_id' => $_POST["comment_id"],
   ':comment'    => $comment_content,
   ':comment_sender_name' => $name
  )
 );
 $error = '<label class="text-success">Comment Added</label>';
}

$data = array(
 'error'  => $error
);

echo json_encode($data);

?>