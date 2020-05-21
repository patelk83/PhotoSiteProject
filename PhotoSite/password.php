<?php
include("functions/connect.php");
include("functions.php");
include("data.php");




$error=null;

if(isset($_POST['submit-btn']) ){
     $verifykey= $_GET['verifykey'];
     $newpassword= $_POST['newpassword'];
    $cpassword= $_POST['cpassword'];
     $npassword=sha1($newpassword);
    
    if($cpassword !==$newpassword){
        $error="Password doesn't match";
    }
    elseif($cpassword ==$newpassword){
     
     $resultset= $mysqli->query("select verifykey from user_detail where verifykey='$verifykey' limit 1");
     
    
     if($resultset->num_rows==1){
         $update=$mysqli->query("update user_detail password='$npassword' where verifykey='$verifykey' limit 1");
         
         if($update){
             echo "Password reset";
             
            
         }
         else{
             echo"Connection issue";
         }
             
     }
     else{
         echo "Invalid account";
     }
       
 }
}
else{
    die("Something wrong");
}

?>