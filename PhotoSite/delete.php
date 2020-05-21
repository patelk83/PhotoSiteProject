<?php
include("functions/connect.php");
include("functions.php");
include("data.php");





if(isset($_GET['post_id'])){
    $image_id= $_GET['post_id'];
    
    $delete_image= "delete from images where image_id ='$image_id' ";
    
    $run_delete= mysqli_query($con,$delete_image);
    
    if($run_delete){
        header("location:userhome.php");
    }
    else{
        echo"Error";
    }
}


?>