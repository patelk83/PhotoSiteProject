<?php

include("functions/connect.php");
include("functions.php");
include("data.php");




?>

<?php require_once('includes/header.php')?>

<!--Navigation Bar-->

<?php require_once('includes/nav.php') ?>


<div class="row">
    <div class="col-sm-4">
    
    </div>
<div id="insert_post" class="col-sm-12">
    <form action="userhome.php" method="post" id="f" enctype="multipart/form-data">
    <textarea class="form-control" id="content" rows="4" name="content" placeholder="What's in your mind?"></textarea><br/>
        <label class="btn btn-warning" >Select Image
        <input type="file" name="upload_image" size="10"> </label>
        <button id="btn-post" class="btn btn-success" name= "post_img_btn">Post</button> 
    
        </form>  
    <?php insertPost(); 
    
    ?>
    </div>

</div>
 

<div class="row">
<div class="col-sm-12">
    <center><h2><strong>News Photos</strong></h2></center>
    
   <?php get_posts(); ?>
     
    </div>
    
     </div>



 
                            


<?php require_once('includes/footer.php') ?>