<?php
$error= NULL;
include("functions/connect.php");
if(isset($_POST['forget-btn'])){
 
   
    $emailid= $_POST['emailid'];

$user="select * from user_detail where emailid='$emailid'";
        
        $run_user=mysqli_query($con,$user);
        $row_user= mysqli_fetch_array($run_user);
         $email_id =$row_user['emailid'];
 	$verifykey=$row_user['verifykey'];

	if($email_id == $emailid){  
        
         
	        
$host = "";
$site = "Email Checkers Incorporated";
$confirmsite = "/PhotoSite/newpass.php";
$myemail = "";
        
          
$to      = $email_id;
$subject = "$site: Verify Your Registration.";
$headers = "From: $myemail \r\n" .
           "Reply-To: $myemail \r\n" .
           'X-Mailer: PHP/' . phpversion() ;
$message = "Welcome to $site!\r\n\r\n" .
           "To Change your password, please click this link:\r\n\r\n" .
           "http://$host$confirmsite?verifykey=$verifykey \r\n" .
           "(If you did not register at $site, \r\n" .
           "just ignore this message.)\r\n";

mail($to, $subject, $message, $headers);
            header("location:login.php"); 
        }

	elseif($emailid !== $email_id){
        $error="Please enter valid email id";
        }
        else
        {
            echo "$error=$mysqli->error";
        }
        
    }
else{
echo "Error";
}


?>
<?php require_once('includes/overall/header.php')?>

<!--NAvigation Bar-->

<?php require_once('includes/overall/nav.php') ?>
        <div class="container">
        
        <div class="row">
            <div class="col-lg-5 m-auto">
            <div class="card bg-light mt-5">
                 <form method="post" action="">
                <div class="card-title">
                   
                <h2 class="text-center mt-2">Forget Password</h2>
                    <hr>
                </div>
                     <div>
                     <?php echo "$error"; ?>
                     </div>
                <div class="card-body">
                
                    <input type="email" name="emailid" placeholder="Email" class="form-control py-2 mb-2" required>
                    <button name="forget-btn" class="btn btn-success float-right">Submit</button>
                    
                </div>
                
                </form>
            </div>
            </div>
        </div>
        
  <?php require_once('includes/overall/footer.php')?>