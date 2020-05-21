<?php
session_start();
include("functions/connect.php");
include("functions.php");
include("data.php");





?>
<?php
             if($_SESSION['userid'] == true){
                    
               
                    $uid= $_SESSION['userid'];
                    $getuser=$mysqli->query("select * from user_detail where userid='$uid' ");
                      $row= $getuser->fetch_assoc();
                        $username= $row['username'];
                        $emailid= $row['emailid'];
                        
             }
            else{
                header("location:login.php");
            }



?>