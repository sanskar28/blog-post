<?php

//fetch_comment.php
require 'connect.inc.php';
require 'core.inc.php';

$postid=$_GET['id'];
$connect = new PDO('mysql:host=localhost:3308;dbname=like_dislike', 'root', '');

$query = "
SELECT * FROM tbl_comment 
WHERE parent_comment_id = '0' 
AND topic_id =".$postid."
ORDER BY comment_id ASC
";

$userid= $_SESSION['user_id'];

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{

    if($userid==$row["user_id"]){
        $temp="right";
        $name1="You";
    }
    else{
        $temp="left";
        $name1= $row["comment_sender_name"];
    }
 $output .= '
 <div class="panel panel-default" style="border : 3px #2A265F ; border-radius:10px; width:90%; float:'.$temp.';">
  <div class="panel-heading" style="background-color : #2A265F; color : white"><b>'.$name1.'</b> on <i>'.$row["date"].'</i></div>
  <div class="panel-body">'.$row["comment"].'</div>
  <div class="panel-footer" align="right"></div>
 </div>
 ';
 $output .= get_reply_comment($connect, $row["comment_id"]);
}

echo $output;

function get_reply_comment($connect, $parent_id = 0, $marginleft = 0)
{
 $query = "
 SELECT * FROM tbl_comment WHERE parent_comment_id = '".$parent_id."'
 ";
 $output = '';
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $count = $statement->rowCount();
 if($parent_id == 0)
 {
  $marginleft = 0;
 }
 else
 {
  $marginleft = $marginleft + 48;
 }
 if($count > 0)
 {
  foreach($result as $row)
  {
   $output .= '
   <div class="panel panel-default" style="margin-left:'.$marginleft.'px; border : 3px #2A265F ; border-radius:10px; ">
    <div class="panel-heading" style="background-color : #2A265F; color : white"><b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
    <div class="panel-body">'.$row["comment"].'</div>
    <div class="panel-footer" align="right"></div>
   </div>
   ';
   $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
  }
 }
 return $output;
}

?>

