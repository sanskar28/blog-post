<?php
session_start();
ob_start();




$current_file = $_SERVER['SCRIPT_NAME'];

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) ){
    $httpreferer =$_SERVER['HTTP_REFERER'];
}



function mysqli_result($res,$row=0,$col=0){ 
    $numrows = mysqli_num_rows($res); 
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}

function getfield($db,$field){
    $query = "SELECT $field FROM users WHERE user_id = ".$_SESSION['user_id'];

    
    

    if($query_run = mysqli_query($db,$query)){
        return mysqli_result($query_run , 0 , 0);
    }else{
        echo "Some error Occured";
    }
    //global $_SESSION['user_id'];
}

function editfield($db,$field,$thing){
    $query = "update users set $field = $thing WHERE user_id = ".$_SESSION['user_id'];

    
    

    if($query_run = mysqli_query($db,$query)){
        
    }else{
        echo "Some error Occured";
    }
    //global $_SESSION['user_id'];
}
?>
