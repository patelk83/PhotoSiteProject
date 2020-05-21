
<?php 

include("functions/connect.php");
include("functions.php");
include("data.php");


$get_id = $_GET['post_id'];

$get_com= "select * from comments where for_image_id='$get_id' ORDER by 1 DESC";
$run_com=mysqli_query($con,$get_com);
 

while($row=mysqli_fetch_array($run_com)){
    $commentid= $row['comment_id'];
    $uploaded_id=$row['uploaded_by_id'];
    $com_name=$row['uploader'];
    $comment=$row['comment'];
    $date=$row['date'];
    

       
    echo"
        <div class='row'>
        <div class='col-sm-4'>
            </div>
            <div class='col-md-6 col-md-offset-3'>
                <div class='panel panel-info>
                <div class='panel-body'>
                    <divid='comment_posts'>
                        <h5>$com_name<i> commented </i> on $date</h5>    
                        <p class='text-primary' style='margin-left:5px; font-size:20px;'>$comment</p>
                      </div>
                    <div>       
                    </div>
                </div>    
            </div>
          ";    
        echo "<br>";
    }

?>
