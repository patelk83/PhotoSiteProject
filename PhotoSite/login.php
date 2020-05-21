<?php

include("functions/connect.php");
include("functions.php");
include("data.php");





$error=null;

if(isset($_POST['login-btn'])){
    session_start();
    
    
    
    
    $username= $mysqli->real_escape_string($_POST['username']);
    
    $password= $mysqli->real_escape_string($_POST['password']);
    $password = sha1($password);
    
   
   
    if(strlen($username)>=5 and strlen($password)>=5){
    $resultset= $mysqli->query("select * from user_detail where username='$username' and password='$password'limit 1");
    
    if($resultset->num_rows !=0){
        $row= $resultset->fetch_assoc();
        $verify= $row['verify'];
        $userid= $row['userid'];
        
        if($verify==1){
            $_SESSION['userid']=$userid;
            header('location:userhome.php');
            
        }
        else{
            $error="Please verify your account from email";
        }
        
    }else{
        $error="Please enter valid username or password";
        
    }
    
    
}
    else{
        $error="Please enter valid username or password";
    }
}
?>

<?php require_once('includes/overall/header.php')?>

<!--Navigation Bar-->

<?php require_once('includes/overall/nav.php') ?>

        <div class="container">
        
        <div class="row">
            <div class="col-lg-5 m-auto">
            <div class="card bg-light mt-5">
                <form method="post" action="">
                <div class="card-title">
                <h2 class="text-center mt-2">Login</h2>
                    <hr>
                </div>
                    <div>
                    <?php echo "$error"; ?>
                    </div>
                <div class="card-body">
                <input type="text" name="username" placeholder="User Name" class="form-control py-2 mb-2" required>
                    <input type="password" name="password" placeholder="Password" class="form-control py-2 mb-2" required >
                    
                    
                </div>
                <div class="card-footer">
                    <a href="forgetpass.php" class="">Forget Password</a>
                    <button class="btn btn-dark float-right" name="login-btn">Login</button>
                    
                
                </div>
                </form>
            </div>
            </div>
        </div>
        
  <?php require_once('includes/overall/footer.php')?>