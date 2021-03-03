<?php 

require 'core.inc.php';
require 'connect.inc.php';

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){


    
}else{
    header('location: index.php');
    
}




include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  
  <title>Posts</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.3.min.js"></script>
  <link rel="stylesheet" href="topic.css">
</head>
<body>
    
    <a class="logoutbtn" href="logout.php">LOGOUT</a>
    <a class="addbtn" href="addpost.php">+</a>

    <div class="intro">
            
            <h1>Welcome, <?php echo getfield($db,"firstname");
                echo " ";
                echo getfield($db,"lastname"); ?>
            </h1>
            
    </div>

   <?php foreach ($posts as $post): ?>

    
   	<div class="course">

       <div class="course-preview">
            <h6><?php echo $post['author']; ?></h6>
			<h2><?php echo $post['heading']; ?></h2>
       </div>

       <div class="course-info">

            <?php if(getfield($db,'admin')==1){
                echo '<i onclick="window.location.href='."'".'delete.php?postid='.$post['id']."'".'" class="fa fa-trash deleteicn"  aria-hidden="true"></i>';
                
            } ?>
       
            <?php echo $post['text']; ?>
                <div class="like-container"  <?php if(strlen($post['text']) > 400) echo 'style="position:unset;"' ?>>
                <!-- if user likes post, style button differently -->
                <i <?php if (userLiked($post['id'])): ?>
                    class="fa fa-thumbs-up like-btn"
                <?php else: ?>
                    class="fa fa-thumbs-o-up like-btn"
                <?php endif ?>
                data-id="<?php echo $post['id'] ?>"></i>
                <span class="likes"><?php echo getLikes($post['id']); ?></span>
                
                &nbsp;&nbsp;&nbsp;&nbsp;

                <!-- if user dislikes post, style button differently -->
                <i 
                <?php if (userDisliked($post['id'])): ?>
                    class="fa fa-thumbs-down dislike-btn"
                <?php else: ?>
                    class="fa fa-thumbs-o-down dislike-btn"
                <?php endif ?>
                data-id="<?php echo $post['id'] ?>"></i>
                <span class="dislikes"><?php echo getDislikes($post['id']); ?></span>
                <i onclick="window.location.href='comments.php?postid=<?php echo $post['id'] ?>'" class="fa fa-commenting-o commenti" aria-hidden="true"><span><?php echo getcomments($post['id']); ?></span></i>
                </div>
        </div>  
         
   	</div>
      
   <?php endforeach ?>
  
  <script src="scripts.js"></script>

    
  
</body>


</html>