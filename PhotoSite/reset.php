<?php require_once('includes/header.php')?>

<!--NAvigation Bar-->

<?php require_once('includes/nav.php') ?>
        <div class="container">
        
        <div class="row">
            <div class="col-lg-5 m-auto">
            <div class="card bg-light mt-5">
                <div class="card-title">
                <h2 class="text-center mt-2">Reset Password</h2>
                    <hr>
                </div>
                <div class="card-body">
                 <input type="password" name="password" placeholder="Password" class="form-control py-2 mb-2">
                    <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control py-2 mb-2">
                    
                                    
                </div>
                <div class="card-footer">
               <button class="btn btn-danger float-right">Cancel</button>
                    <button class="btn btn-success float-left">Send password</button>
                
                </div>
            </div>
            </div>
        </div>
        
   <?php require_once('includes/footer.php')?>