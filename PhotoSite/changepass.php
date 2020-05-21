<?php
include("functions/connect.php");
include("data.php");

$error=null;

if(isset($_POST['submit-btn'])){
   
    
    $currentpassword= $_POST['currentpassword'];
     $newpassword= $_POST['newpassword'];
    $cpassword= $_POST['cpassword'];
    $curntpass= sha1($currentpassword);
    $npassword=sha1($newpassword);
    $user_id = $_SESSION['userid'];
    
    if($cpassword != $newpassword){
        echo " Please enter valid password";
    }
    
    else{    
        
        
		$user="select password from user_detail where userid = '$user_id'";
        
        $run_pass=mysqli_query($con,$user);
        $row_pass= mysqli_fetch_array($run_pass);
        $pass= $row_pass['password'];
        
        
     if($pass==$curntpass){
          $mysqli=NEW mysqli('','','','');
         $update=$mysqli->query("update user_detail set password='$npassword' where userid='$user_id' limit 1");
         
         if($update){
             $error= "Password is changed sucessfully";
                
             
            
         }
         else{
             $error="Connection issue";
         }
       }
        elseif($pass!==$curntpass){
            $error= "Please enter correct current password";
        }
        
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
                <input type="password" name="currentpassword" placeholder="Current Password" class="form-control py-2 mb-2" required>
                    <input type="password" name="newpassword" placeholder="New Password" class="form-control py-2 mb-2" required>
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
  <?php require_once('includes/footer.php') ?>