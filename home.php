<!DOCTYPE html>
<?php
session_start();
include("includes/head.php");
?>
<html>
<?php
	$user = $_SESSION['user_email'];
	$get_user = "SELECT * FROM users WHERE user_email='".$user."'";
	$run_user = mysqli_query($con,$get_user);
	$row = mysqli_fetch_array($run_user);
	$user_name = $row['user_name'];
?>
<head>

	<title><?php echo "$user_name"; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/allstyle.css">
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">
.button {border: none;
	background-color:#24292e;
  color: white;
  padding: 11px 12px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;}
  .button:hover {opacity: 1}

	.button1 {border: none;
		background-color:#24292e;
	  color: white;
	  padding: 11px 12px;
	  text-align: center;
	  font-size: 16px;
	  margin: 4px 2px;
	  opacity: 0.6;
	  transition: 0.3s;
	  display: inline-block;
	  text-decoration: none;
	  cursor: pointer;
		right: 20%;
	}
	  .button1:hover {opacity: 1}
	</style>


</head>

<body>
	<?php include("includes/header.php"); ?>
<div class="row">
	<div class="col-sm-12">
	</div>
	<div id="insert_post" class="col-sm-12">
		<center>
			<center><h3><strong>Add New Projects</strong></h3><br></center>
		<form name="home" onsubmit="return valid()" action="home.php?id=<?php echo $user_id; ?>" method="post" id="f" enctype="multipart/form-data">
				<textarea class="form-control" id="title" rows="1" name="title" placeholder="title" ></textarea><br>
				<div class="error"></div>
		<textarea class="form-control" id="content" rows="4" name="content" placeholder="content"></textarea><br>
		<textarea class="form-control" id="title" rows="1" name="members" placeholder="members" ></textarea><br>
		<label  id="upload_image_button" class="button1" style="top:70%; right:5%">Project Image
		<input type="file" name="upload_image" size="30" >
		</label>
		<button  id="btn-post" class="button" name="sub">Post</button>
		</form>
		<?php insertPost(); ?>
		</center>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<center><h2><strong>News Feed</strong></h2><br></center>
		<?php echo get_posts(); ?>
	</div>
</div>
</body>

</html>
