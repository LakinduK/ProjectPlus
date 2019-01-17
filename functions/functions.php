<?php

$con = mysqli_connect("localhost","root","","social_network") or die("Connection was not established");

//function for inserting post

function insertPost(){
	if(isset($_POST['sub'])){
		global $con;
		global $user_id;
			$title = htmlentities($_POST['title']);
				$members = htmlentities($_POST['members']);
		$content = htmlentities($_POST['content']);
		$upload_image = $_FILES['upload_image']['name'];
		$image_tmp = $_FILES['upload_image']['tmp_name'];
		$random_number = rand(1, 100);

		if(strlen($content) < 10){
			echo "<script>alert('Please Use 250 or grater than 10 words!')</script>";
			echo "<script>window.open('home.php', '_self')</script>";
		}else{
			if(strlen($upload_image) >= 1 && strlen($content) >= 1){
				move_uploaded_file($image_tmp, "imagepost/$upload_image.$random_number");
				$insert = "INSERT INTO posts (user_id,post_title, post_content,post_members, upload_image, post_date) VALUES('$user_id','$title', '$content','$members', '$upload_image.$random_number', NOW())";

				$run = mysqli_query($con, $insert);

				if($run){
					echo "<script>alert('Your Post updated a moment ago!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";

					$update = "update users set posts='yes' where user_id='$user_id'";
					$run_update = mysqli_query($con, $update);
				}

				exit();
			}else{
				if($upload_image=='' && $content == '' && $title == ''){
					echo "<script>alert('Error Occured while uploading!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
				}else{
					if($content==''){
						echo "<script>alert('Error Occured while uploading!')</script>";
						echo "<script>window.open('home.php', '_self')</script>";
						}

					}
				}
			}
		}
	}

// shoving post
function get_posts(){
	global $con;
	$per_page = 4;

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page=1;
	}

	$start_from = ($page-1) * $per_page;

	$get_posts = "select * from posts ORDER by 1 DESC LIMIT $start_from, $per_page";

	$run_posts = mysqli_query($con, $get_posts);

	while($row_posts = mysqli_fetch_array($run_posts)){

		$post_id = $row_posts['post_id'];
		$post_title = $row_posts['post_title'];
		$post_members = $row_posts['post_members'];
		$user_id = $row_posts['user_id'];
		$content = substr($row_posts['post_content'], 0,2000);
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];

		$user = "select *from users where user_id='$user_id' AND posts='yes'";
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);

		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];

		//now displaying posts from database



	 if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
						<h2><i>$post_title</i></h2>
							<p>$content</p>
							members:<p>$post_members</p>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>

					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>rating</button></a><br>

				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
						<h2><i>$post_title</i></h2>
							<p>$content</p>
							members:<p>$post_members</p>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}
	}

	include("pagination.php");
}
function insertuser(){
	if(isset($_POST['uname']) AND isset($_POST['upsw']) AND isset($_POST['uemail'])){
    $username = $_POST['uname'];
    $psw = $_POST['upsw'];
		$email = $_POST['uemail'];
    include 'includes/connection.php';
    $sql2 ="INSERT INTO users(user_name,user_pass,user_email) VALUES ('".$username."','".$psw."','".$email."')";
    $result2= mysqli_query($con,$sql2);
    if ($result2) {
      echo " record added";
    }else{
      echo "record didint added";
    }
}
}
function deleteuser(){
		if (isset($_GET['delete'])) {
		$uname = $_GET['uname'];
		include 'includes/connection.php';
		$sql1 = "DELETE FROM users WHERE user_name='$uname'";
		$result1 = mysqli_query($con,$sql1);
	  if ($result1) {
	    echo "delete";

		}else{
			echo "noo";
		}

	}
}


?>
