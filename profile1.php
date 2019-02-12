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
		$fname = $row['f_name'];
		$lname = $row['l_name'];
		$desc = $row['describe_user'];
		$batch = $row['batch'];
		$degree = $row['degree'];
		$pass = $row['user_pass'];
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


	<div><h1 ><small>Edit your prifile</small></h1></div>
<div class="edit">
<form name="edit_profile" class="edit_profile" action="edit.php" method="post">
		<center>


		Username<br />
	<input type="text" name="username" placeholder="username"  value="<?php echo $user_name; ?>"><br />
	First Name<br />
	<input type="text" name="firstname" placeholder="firstname"  value="<?php echo $fname; ?>"><br />
		Second Name<br />
	<input type="text" name="lastname" placeholder="lastname"  value="<?php echo $lname; ?>" ><br />
		Description<br />
	<input type="text" name="udesc" placeholder="discription"  value="<?php echo $desc; ?>"><br>
		Batch<br />
	<input type="text" name="batch" placeholder="batch"  value="<?php echo $batch; ?>"><br>
		Degree<br />
	<input type="text" name="udegree" placeholder="degree"  value="<?php echo $degree; ?>"><br>
		Password<br />
	<input type="password" name="upws" placeholder="********" value="<?php echo $pass; ?>"  ><br>
	<input type="submit" name="edit_btn" style="background-color:#24292e; color: hsla(0,0%,100%,.75); border: none;text-decoration: none;
  display: inline-block;"value="save changes">
		</center>
</form>
</div>

</body>
</html>
