<?php
//index.php

require 'connect.inc.php';
require 'core.inc.php';
require 'server.php';

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){


    
}else{
    header('location: index.php');
    
}



$post_id = $_GET['postid'];

function getpostfield($db,$field,$post_id){
    $query = "SELECT $field FROM posts WHERE id = ".$post_id;

    
    

    if($query_run = mysqli_query($db,$query)){
        return mysqli_result($query_run , 0 , 0);
    }else{
        echo "Some error Occured";
    }
    //global $_SESSION['user_id'];
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Comment System using PHP and Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="topic.css">

 </head>
 <body>

 <i class="fa fa-chevron-circle-left backbtn" onclick="window.location.href='posts.php'" aria-hidden="true"></i>

  
 <a class="logoutbtn" href="logout.php" style="text-decoration:none;">LOGOUT</a>
  <div class="course course1">

<div class="course-preview">
     <h6><?php echo getpostfield($db,'author',$post_id); ?></h6>
     <h2><?php echo getpostfield($db,'heading',$post_id); ?></h2>
</div>

<div class="course-info">


     <?php echo getpostfield($db,'text',$post_id); ?>
         <div class="like-container"  <?php if(strlen(getpostfield($db,'text',$post_id)) > 400) echo 'style="position:unset;"' ?>>
         <!-- if user likes post, style button differently -->
         <i <?php if (userLiked($post_id)): ?>
             class="fa fa-thumbs-up like-btn"
         <?php else: ?>
             class="fa fa-thumbs-o-up like-btn"
         <?php endif ?>
         data-id="<?php echo $post_id?>"></i>
         <span class="likes"><?php echo getLikes($post_id); ?></span>
         
         &nbsp;&nbsp;&nbsp;&nbsp;

         <!-- if user dislikes post, style button differently -->
         <i 
         <?php if (userDisliked($post_id)): ?>
             class="fa fa-thumbs-down dislike-btn"
         <?php else: ?>
             class="fa fa-thumbs-o-down dislike-btn"
         <?php endif ?>
         data-id="<?php echo $post_id ?>"></i>
         <span class="dislikes"><?php echo getDislikes($post_id); ?></span>
         <i onclick="window.location.href='comments.php?postid=<?php echo $post_id ?>'" class="fa fa-commenting-o commenti" aria-hidden="true"><span>Comments</span></i>
         </div>
 </div>  
  
</div>


  <div class="container">
  <div id="display_comment"></div>
   <form method="POST" id="comment_form">
    
    <div class="form-group">
     <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="1"></textarea>
    </div>
    <div class="form-group2">
     <input type="hidden" name="comment_id" id="comment_id" value="0" />
     <input type="submit" name="submit" id="submit" class="btn submitbtn" value="Submit" />
    </div>
   </form>
   <br />
   
  </div>
 </body>
</html>

<script src="scripts.js"></script>

<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"comment-add.php?id=<?php echo $post_id ?>",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 setInterval(() => {
    load_comment();
 }, 1000);
 

 function load_comment()
 {
  $.ajax({
   url:"comment-list.php?id=<?php echo $post_id ?>",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 
});
</script>
