

<?php
 if(isset($_GET['verifykey'])){
     $verifykey= $_GET['verifykey'];
    
     $resultset= $mysqli->query("select verify,verifykey from user_detail where verify = 0 and verifykey='$verifykey' limit 1");
     
     if($resultset->num_rows==1){
         $update=$mysqli->query("update user_detail set verify=1 where verifykey='$verifykey' limit 1");
         
         if($update){
             echo"<h1> You are verified</h1>";
             echo"<a href='/login.php'>Login</a>";
             
            
         }
         else{
             echo"Connection issue";
         }
             
     }
     else{
         echo "Invalid account";
     }
       
 }
else{
    die("Something wrong");
}
?>

