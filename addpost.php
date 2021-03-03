<?php


require 'connect.inc.php';
require 'core.inc.php';
if(isset($_POST['heading']) && isset($_POST['content'])){
    $heading = $_POST['heading'];
    $content = $_POST['content'];

    $author = getfield($db,'firstname');
    $author.=" ";
    $author.=getfield($db,'lastname');
    
   

    $query = "INSERT INTO posts (heading,text,author) 
    VALUES('$heading', '$content', '$author')";
    
    if(mysqli_query($db, $query)){
        header('location: index.php');
    }
    else{
        echo "Could not add the Post";
    }
}

?>


<html>
    <head>
        <title>Talkkerr</title>
        <link rel="stylesheet" type="text/css" href="addpost.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        
    </head>


    <i class="fa fa-chevron-circle-left backbtn" onclick="window.location.href='posts.php'" aria-hidden="true"></i>
    <div class="form-container">
        <div class="heading">
            <h1>Add a new Post Now....</h1>
        </div>

        <form action="addpost.php" method="post">
        <input type="text" class="topic" placeholder="Topic" name="heading" required autocomplete="off" />
        <textarea name="content" maxlength="600" id="text-area" cols="30" rows="12" placeholder="Body" required></textarea>

        <button type="submit">ADD POST</button>
        </form>
    </div>
    





</html>