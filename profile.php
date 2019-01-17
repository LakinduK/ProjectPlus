<!DOCTYPE html>
<?php
session_start();
include("includes/head.php");
?>
<html>
<head>
	<?php
		$user = $_SESSION['user_email'];
		$get_user = "select * from users where user_email='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);

		$user_name = $row['user_name'];
	?>
	<title><?php echo "$user_name"; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/allstyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>


<body>
	<?php

	include("includes/header.php");
	?>
<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-8">
		<?php
			echo"
			<div>
				<div><img id='cover-img' class='img-rounded' src='cover/$user_cover' alt='cover'></div>
				<form action='profile.php?u_id=$user_id' method='post' enctype='multipart/form-data'>

				<ul class='nav pull-left' style='position:absolute;top:10px;left:40px;'>
					<li class='dropdown'>
						<button class='dropdown-toggle btn btn-default' data-toggle='dropdown'>Change Cover</button>
						<div class='dropdown-menu'>
							<center>
							<p>Click <strong>Select Cover</strong> and then click the <br> <strong>Update Cover</strong></p>
							<label class='btn btn-info'> Select Cover
							<input type='file' name='u_cover' size='60' />
							</label><br><br>
							<button name='submit' class='btn btn-info'>Update Cover</button>
							</center>
						</div>
					</li>
				</ul>

				</form>
			</div>
			<div id='profile-img'>
				<img src='users/$user_image' alt='Profile' class='img-circle' width='180px' height='185px'>
				<form action='profile.php?u_id='$user_id' method='post' enctype='multipart/form-data'>

				<label id='update_profile'> Select Profile
				<input type='file' name='u_image' size='60' />
				</label><br><br>
				<button id='button_profile' name='update' class='btn btn-info'>Update Profile</button>
				</form>
			</div><br>
			";
		?>
		<?php

			if(isset($_POST['submit'])){

				$u_cover = $_FILES['u_cover']['name'];
				$image_tmp = $_FILES['u_cover']['tmp_name'];
				$random_number = rand(1,100);

				if($u_cover==''){
					echo "<script>alert('Please Select Cover Image')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					exit();
				}else{
					move_uploaded_file($image_tmp, "cover/$u_cover.$random_number");
					$update = "update users set user_cover='$u_cover.$random_number' where user_id='$user_id'";

					$run = mysqli_query($con, $update);

					if($run){
					echo "<script>alert('Your Cover Updated')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					}
				}

			}

		?>
	</div>


	<?php
		if(isset($_POST['update'])){

				$u_image = $_FILES['u_image']['name'];
				$image_tmp = $_FILES['u_image']['tmp_name'];
				$random_number = rand(1,100);

				if($u_image==''){
					echo "<script>alert('Please Select Profile Image on clicking on your profile image')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					exit();
				}else{
					move_uploaded_file($image_tmp, "users/$u_image.$random_number");
					$update = "update users set user_image='$u_image.$random_number' where user_id='$user_id'";

					$run = mysqli_query($con, $update);

					if($run){
					echo "<script>alert('Your Profile Updated')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					}
				}

			}
	?>
	<div class="col-sm-2">
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-2" style="">
		<?php
		echo"
			<center><h2><strong>About</strong></h2></center>
			<center><h4><strong>$first_name $last_name</strong></h4></center>
			<p><strong><i style='color:grey;'>$describe_user</i></strong></p><br>
			<p><strong>email: </strong> $user_email</p><br>
			<p><strong>degree: </strong> $user_degree</p><br>
			<p><strong>batch: </strong> $user_batch</p><br>
			<p><strong>Date of Birth: </strong> $user_birthday</p><br>
		";
		?>
	</div>
	<div class="col-sm-6" >
		<!--user post -->
		<?php
			global $con;
			if(isset($_GET['u_id'])){
				$u_id = $_GET['u_id'];
			}
				$get_posts = "SELECT * FROM posts WHERE user_id = '".$u_id."' ORDER BY 1 DESC LIMIT 5 ";
				$run_posts = mysqli_query($con,$get_posts);

				while ($row_posts = mysqli_fetch_array($run_posts)) {
					$post_id =$row_posts['post_id'];
					$user_id =$row_posts['user_id'];
					$title =$row_posts['post_title'];
					$content =$row_posts['post_content'];
					$members =$row_posts['post_members'];
					$upload_image =$row_posts['upload_image'];
					$post_date =$row_posts['post_date'];
					$user = "SELECT * FROM users WHERE user_id = '".$user_id."' AND posts = 'yes'";
					$run_user = mysqli_query($con,$user);
					$row_user = mysqli_fetch_array($run_user);

					$user_name = $row_user['user_name'];
					$user_image = $row_user['user_image'];

					if(strlen($content) >= 1 && strlen($upload_image) >= 1){
?>
<div class='own_posts'>
		<div class='row'>
			<div class='col-sm-2'>
			<p><img src='users/<?php echo $user_image;?>' class='img-circle' width='100px' height='100px'></p>
			</div>
			<div class='col-sm-6'>
				<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=<?php echo $user_id; ?>'><?php echo $user_name; ?></a></h3>
				<h4><small style='color:black;'>Updated a post on <strong><?php $post_date; ?></strong></small></h4>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
			<h2><i><?php echo $title; ?></i></h2>
				<p><?php echo $content; ?></p>
				members:<p><?php echo $members; ?> </p>
				<img id='posts-img' src='imagepost/<?php echo $upload_image; ?>' style='height:450px;'>
			</div>
		</div><br>



</div>
<?php

						global $con;
						if (isset($_GET['u_id'])) {
							$us_id = $_GET['u_id'];
						}
						$get_posts = "SELECT user_email FROM users WHERE user_id = '$us_id'";
						$run_user = mysqli_query($con , $get_posts);
						$row = mysqli_fetch_array($run_user);

						$user_email = $row['user_email'];
						$user = $_SESSION['user_email'];
						$get_user = "SELECT * FROM users WHERE user_email = '$user_email'";
						$run_user = mysqli_query($con, $get_user);
						$row = mysqli_fetch_array($run_user);

						$user_id = $row['user_id'];
						$u_email = $row['user_email'];

						if ($u_email != $user_email) {
						echo "<script>window.open('profile.php?u_id=$user_id','_self')</script>";
					}else {
						echo "
							<a href= 'functions/delete_post.php?post_id=$post_id' sytle='float:right'><button class='btn btn-danger'>Delete</button></a><br />
							";
					}



 					}
							include("functions/delete_post.php");
 				}


		 ?>
	</div>


</dsiv>
</body>

</html>
