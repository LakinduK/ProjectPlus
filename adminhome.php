<!DOCTYPE html>
<?php
session_start();
include("includes/adminheader.php");
?>
<html>
<head>
	<?php
		$user = $_SESSION['user_email'];
	?>
	<title><?php echo "$user_name"; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/allstyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">

	<title>Admin Home</title>
</head>
<body>

<div class="row">
	<div class="col-sm-12">
		<center><h2><strong>News Feed</strong></h2><br></center>
		<?php echo get_posts(); ?>
	</div>
</div>
</body>

</html>
