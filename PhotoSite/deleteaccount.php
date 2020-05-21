<?php
include("functions/connect.php");
include("data.php");

$error=null;

if(isset($_POST['delete-btn'])){
   
    
    $emailid= $_POST['emailid'];
     $password= $_POST['password'];
  
    $password=sha1($password);
    $user_id = $_SESSION['userid'];
 
        
        
		$user="select emailid,password from user_detail where userid = '$user_id'";
        
        $run_pass=mysqli_query($con,$user);
        $row_pass= mysqli_fetch_array($run_pass);
        $pass= $row_pass['password'];
         $email= $row_pass['emailid'];
        
     if($pass==$password && $email==$emailid){
          
         
         $delete_account= "delete from user_detail where emailid ='$email' ";
    
            $run_delete= mysqli_query($con,$delete_account);
    
         if($run_delete){
          header("location:login.php");
        
            
         }
         else{
             $error="Connection issue";
         }
       }
        elseif($pass!==$password || $email!==$emailid){
            $error= "Please enter correct current password or email";
        }
        
    }

   
?>

<?php require_once('includes/header.php')?>

<!--Navigation Bar-->

<?php require_once('includes/nav.php') ?>

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
                    <?php echo $error; ?>
                    </div>
                <div class="card-body">
                    <input type="email" name="emailid" placeholder="Email" class="form-control py-2 mb-2" required>
                <input type="password" name="password" placeholder="Current Password" class="form-control py-2 mb-2" required>

                </div>
                <div class="card-footer">
                    
                    <button class="btn btn-dark float-right" name="delete-btn">Delete Account</button>
                    
                
                </div>
                </form>
            </div>
            </div>
        </div>
</div>
  <?php require_once('includes/footer.php') ?>