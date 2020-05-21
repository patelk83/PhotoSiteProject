<?php
include("functions/connect.php");
include("functions.php");
include("data.php");





//function for inserting post

function insertPost(){
       
	if(isset($_POST['post_img_btn'])){
		global $con;
		global $uid;

		$content = htmlentities($_POST['content']);
		$upload_image = $_FILES['upload_image']['name'];
		$image_tmp = $_FILES['upload_image']['tmp_name'];
		
            if($content=='' and $upload_image==''){
                echo "Please choose file";
            }

		if(strlen($content) > 250){
			echo "Large message";
		}else{
			if(strlen($upload_image) >= 1 && strlen($content) >= 1){
				move_uploaded_file($image_tmp, "images/$upload_image");
				$insert = "insert into images (uploaded_by_id, image,text) values('$uid', '$upload_image','$content')";

				$run = mysqli_query($con, $insert);

				if($run){
					
                    header("Location:userhome.php");
				}

				exit();
			}
            else{
                echo "Error";
            }
		}
	}
}

function get_posts(){
	global $con;
    global $uid;
    $get_posts = "select * from images where uploaded_by_id = '$uid'ORDER by 1 DESC  ";

	$run_posts = mysqli_query($con, $get_posts);
	

	while($row_posts = mysqli_fetch_array($run_posts)){

		$imageid= $row_posts['image_id'];
        $userid=$row_posts['uploaded_by_id'];
        $upload_image=$row_posts['image'];
        $content=$row_posts['text'];
        $post_date=$row_posts['img_date'];
        

		$user="select * from user_detail where userid='$userid'";
        
        $run_user=mysqli_query($con,$user);
        $row_user= mysqli_fetch_array($run_user);
        $user_name= $row_user['username'];
		//now displaying posts from database

		
		 if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='images/profile/profile1.jpg' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='userhome.php?uid=$userid'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
                         
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p>
							<img id='posts-img' src='images/$upload_image' style='height:350px;'>
						</div>
					</div><br>
                    
					<a href='oneimage.php?post_id=$imageid' style='float:Right;'><button class='btn btn-info'>Comment</button></a><br><br>
                    <a href='delete.php?post_id=$imageid' style='float:left;'><button class='btn btn-danger'>Delete Image</button></a><br>
                    
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}
        else{
			echo"error";}
			
		}
        
        }

		
	

	function get_allposts(){
	global $con;
    global $uid;
    $get_posts = "select * from images ORDER by 1 DESC  ";

	$run_posts = mysqli_query($con, $get_posts);
	

	while($row_posts = mysqli_fetch_array($run_posts)){

		$imageid= $row_posts['image_id'];
        $userid=$row_posts['uploaded_by_id'];
        $upload_image=$row_posts['image'];
        $content=$row_posts['text'];
        $post_date=$row_posts['img_date'];
        

		$user="select * from user_detail where userid='$userid'";
        
        $run_user=mysqli_query($con,$user);
        $row_user= mysqli_fetch_array($run_user);
        $user_name= $row_user['username'];
		//now displaying posts from database

		
		 if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='images/profile/profile1.jpg' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='userhome.php?uid=$userid'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p>
							<img id='posts-img' src='images/$upload_image' style='height:350px;'>
						</div>
					</div><br>
					<a href='oneimage.php?post_id=$imageid' style='float:right;'><button class='btn btn-info'>View</button></a><br>
                    
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else{
			echo"error";}
			
		}
	}



function single_post(){
    
    
    global $con;
    
    if(isset($_GET['post_id'])){
        global $con;
       
        $get_id=$_GET['post_id'];
        $get_posts="select * from images where image_id='$get_id'";
        $run_posts= mysqli_query($con, $get_posts);
        
        $row_posts=mysqli_fetch_array($run_posts);
        
        
        $imageid= $row_posts['image_id'];
        $userid=$row_posts['uploaded_by_id'];
        $upload_image=$row_posts['image'];
        $content=$row_posts['text'];
        $post_date=$row_posts['img_date'];
        
        $user="select * from user_detail where userid='$userid'";
        
        $run_user=mysqli_query($con,$user);
        $row_user= mysqli_fetch_array($run_user);
        $user_name= $row_user['username'];
        
        $user_id=$_SESSION['userid'];
        $get_com="select * from user_detail where userid='$user_id'";
        $run_com=mysqli_query($con,$get_com);
        $row_com=mysqli_fetch_array($run_com);
        $user_com_id=$row_com['userid'];
        $user_com_name=$row_com['username'];
        
        if(isset($_GET['post_id'])){
            $post_id=$_GET['post_id'];
            
        }
        
        $get_posts="select image_id from images where image_id='$post_id' ";
        $run=mysqli_query($con,$get_posts);
        $row=mysqli_fetch_array($run);
        $p_id=$row['image_id'];
        
        if($p_id != $post_id){
            echo"error";
            header('location:userhome.php');
        
        }
        else{
            if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='images/profile/profile1.jpg' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='userhome.php?uid=$userid'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
                         
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p>
							<img id='posts-img' src='images/$upload_image' style='height:350px;'>
						</div>
					</div><br>
                    
					
                    <a href='delete.php?post_id=$imageid' style='float:left;'><button class='btn btn-danger'>Delete Image</button></a><br>
                    
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}
        else{
			echo"error";}
               
          include("comments.php");         
        echo"
        <div class='row'>
            <div class='col-sm-4'>
				</div>
                <div class='col-md-6 col-md-offset-4'>
                <div class='panel panel-info'>
                    <div class='panel-body'>
                        <form action='' method='post' class='form-inline'>
                        <textarea placeholder='write your comment here!' class='pb-cmnt-textarea' name='comment'></textarea>
                        <button class='btn btn-info pull-right' name='reply'>Comment</button>
                        </form>
                    </div>
                    </div>
              </div>            
        </div>
        <div class='row'>
            <div class='col-sm-4'>
				</div>
         </div>
        ";
            echo "<br>";
            
        
            
        if(isset($_POST['reply'])){
            $comment= htmlentities($_POST['comment']);
            
            if($comment==""){
                echo "Please Enter comment";
                header("location:oneimage.php?post_id=$get_id");
            }
            else{
                
                
                
                $insert= "insert into comments(uploaded_by_id,uploader,for_image_id,comment) values('$user_com_id','$user_com_name','$imageid','$comment')";
                $run = mysqli_query($con,$insert);
                
                if($run){
                    
                     header("location:oneimage.php?post_id=$get_id");
                }
                
              
                
            }
        }
            
            
            
			
		}
            
            
        }
        
        
    }


?>


