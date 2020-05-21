<?php
include("functions/connect.php");
$error= NULL;
if(isset($_POST['signup-btn'])){
    
    $username= $_POST['username'];
    $emailid= $_POST['emailid'];
    $password= $_POST['password'];
    $cpassword= $_POST['cpassword'];
    
    $user="select * from user_detail ";
        
        $run_user=mysqli_query($con,$user);
        $row_user= mysqli_fetch_array($run_user);
        $user_name= $row_user['username'];
        $email_id =$row_user['emailid'];
    
    
    if(strlen($username)<5){
        $error="Username must be 5 characters";
    }
    elseif($password!=$cpassword){
        $error="password and confirm password doesn't match";
    }
    elseif($user_name==$username ){
        $error="Username already registered.";
        
    }
     elseif($email_id==$emailid){
        $error="Emaild id already registered.";
        
    }
    else{
        
       
        $username= $mysqli->real_escape_string($username);
        $emailid= $mysqli->real_escape_string($emailid);
        $password= $mysqli->real_escape_string($password);
        $cpassword= $mysqli->real_escape_string($cpassword);
         $now = time();
	$verifykey = sha1("confirmation" . $now . $_POST['emailid']);
        $password= sha1($password);
        $insert= $mysqli->query("insert into user_detail(username,emailid,password,verifykey) values ('$username','$emailid','$password','$verifykey')");
        
$host = "";
$site = "Email Checkers Incorporated";
$confirmsite = "demo/verify.php";
$myemail = "";

        if($insert){
          
$to      = $emailid;
$subject = "$site: Verify Your Registration.";
$headers = "From: $myemail \r\n" .
           "Reply-To: $myemail \r\n" .
           'X-Mailer: PHP/' . phpversion() ;
$message = "Welcome to $site!\r\n\r\n" .
           "To confirm your username, please click this link:\r\n\r\n" .
           "http://$host$confirmsite?verifykey=$verifykey \r\n" .
           "(If you did not register at $site, \r\n" .
           "just ignore this message.)\r\n";

mail($to, $subject, $message, $headers);
            header("location:login.php"); 
        }
        else
        {
            echo $error=$mysqli->error;
        }
        
    }
    
    
    
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
                   
                <h2 class="text-center mt-2">Registration</h2>
                    <hr>
                </div>
                     <div>
                     <?php echo "$error"; ?>
                     </div>
                <div class="card-body">
                <input type="text" name="username" placeholder="User Name" class="form-control py-2 mb-2" required>
                    <input type="email" name="emailid" placeholder="Email" class="form-control py-2 mb-2" required>
                    <input type="password" name="password" placeholder="Password" class="form-control py-2 mb-2" required>
                    <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control py-2 mb-2" required>
                    <button name="signup-btn" class="btn btn-success float-right">Sign Up</button>
                    
                </div>
                
                </form>
            </div>
            </div>
        </div>
        
  <?php require_once('includes/overall/footer.php')?>