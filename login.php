<?php
session_start();

include("includes/connection.php");

	if (isset($_POST['login'])) {

		$email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
		$pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));

		$select_user = "SELECT * FROM users WHERE user_email='$email' AND user_pass='$pass'";
		$query= mysqli_query($con, $select_user);
		$check_user = mysqli_num_rows($query);

		if($check_user == 1){
			$_SESSION['user_email'] = $email;
			echo "<script>window.open('home.php', '_self')</script>";

		}else{
			$select_admin = "SELECT * FROM admin WHERE admin_email='$email' AND admin_password ='$pass'";
			$query1= mysqli_query($con, $select_admin);
			$check_admin = mysqli_num_rows($query1);

			if($check_admin == 1){
				$_SESSION['user_email'] = $email;
				echo "<script>window.open('adminprofile.php', '_self')</script>";
				}
				else {
					echo"<script>alert('Your Email or Password is incorrect')</script>";

				}

			}
}
?>
