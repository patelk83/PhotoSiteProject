<?php
include("functions/connect.php");
include("functions.php");
include("data.php");




?>
<html>
    <head>
    <title>Photo Site</title>
    </head>
<body>
<!--Navigation Bar-->

    <div class="container">
        
        <div class="row">
            <div class="col-lg-5 m-auto">
            <div class="card bg-light mt-5">
                <form method="post" action="" >
                <div class="card-title">
                <h2 class="text-center mt-2">Set Password</h2>
                    <hr>
                </div>
                    <div>
                    
                    </div>
                <div class="card-body">
                <input type="password" name="newpassword" placeholder="New Password" class="form-control py-2 mb-2" required><br><br>
                    <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control py-2 mb-2" required>

                 
                </div>
                <div class="card-footer">
                    
                    <button class="btn btn-dark float-right" name="submit-btn">Submit</button>
                    
                
                </div>
                </form>
            </div>
            </div>
        </div>
</div>
    </body>
  </html>
<?php

$error=null;

if(isset($_POST['submit-btn']) ){
	$verifykey=$_GET['verifykey'];
    
     $newpassword= $_POST['newpassword'];
    $cpassword= $_POST['cpassword'];
     $npassword=sha1($newpassword);


    
    if($cpassword !== $newpassword){
        echo "Password doesn't match";
    }
    elseif($cpassword == $newpassword){
    
     $resultset= $mysqli->query("select verifykey from user_detail where verifykey='$verifykey' limit 1");        
            
     if($resultset->num_rows==1){
         $update=$mysqli->query("update user_detail set password='$npassword' where verifykey='$verifykey' limit 1");
         
         if($update){
             echo "Password reset";
		header("location:login.php");
             
            
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


?>
