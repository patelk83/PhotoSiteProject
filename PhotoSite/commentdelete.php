<?php
session_start();
$con = mysqli_connect("","","","");
if(isset($_GET['comment_id'])){
    $comment_id= $_GET['comment_id'];
    $user_id=$_GET['userid'];
    
    
    
    
    $delete_image= "delete from comments where comment_id ='$comment_id' AND uploaded_by_id = '$user_id' ";
    
    $run_delete= mysqli_query($con,$delete_image);
    
    if($run_delete){
        header("location:oneimage.php?post_id=$image_id");
    }
    else{
        echo"Error";
    }
}


?>