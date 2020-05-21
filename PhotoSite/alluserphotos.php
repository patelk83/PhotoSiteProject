<?php
include("functions/connect.php");
include("functions.php");
include("data.php");




?>

<?php require_once('includes/header.php')?>

<!--Navigation Bar-->

<?php require_once('includes/nav.php') ?>

  
<div class="row">
<div class="col-sm-12">
    <center><h2><strong>News Photos</strong></h2></center>
    
   <?php get_allposts(); ?>
     
    </div>
     </div>                   


<?php require_once('includes/footer.php') ?>