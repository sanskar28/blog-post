<?php
require 'core.inc.php';
require 'connect.inc.php';


if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){

    echo "Your logged in ";
    echo getfield($db,"firstname");
    echo " ";
    echo getfield($db,"lastname");

    $currentq = getfield($db,"current_ques");

    echo "<a href='logout.php'>Logout</a>";

    header('location: posts.php');
}else{

    include 'loginform.php';
    

    
}



?>


