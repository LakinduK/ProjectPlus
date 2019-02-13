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
