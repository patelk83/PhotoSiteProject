<?php include("data.php");
    include("functions.php");
?>
<?php require_once('includes/header.php')?>

<!--Navigation Bar-->

<?php require_once('includes/nav.php') ?>
<div class="row">
    <div class="col-sm-12">
        
       
         <?php
    single_post();
        ?>
      
    </div>
    
</div>

<?php require_once('includes/footer.php') ?>