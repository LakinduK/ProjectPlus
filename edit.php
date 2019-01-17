<!DOCTYPE html>
<?php
session_start();
include("includes/head.php");
?>
<html>
<head>

	<?php
		include("includes/header.php");


	if (isset($_POST['edit_btn'])){

	$uname = $_POST['username'];
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$udesc = $_POST['udesc'];
	$ubatch = $_POST['batch'];
	$udegree = $_POST['udegree'];
	$psw = $_POST['upws'];



$sql1 = "UPDATE users SET f_name='".$fname."' WHERE user_email='".$user."'";
$sql2 = "UPDATE users SET l_name='".$lname."' WHERE user_email='".$user."'";
$sql3 = "UPDATE users SET user_name='".$uname."' WHERE user_email='".$user."'";
$sql4 = "UPDATE users SET describe_user='".$udesc."' WHERE user_email='".$user."'";
$sql5 = "UPDATE users SET user_pass='".$psw."' WHERE user_email='".$user."'";
$sql6 = "UPDATE users SET batch='".$ubatch."' WHERE user_email='".$user."'";
$sql7 = "UPDATE users SET degree='".$udegree."' WHERE user_email='".$user."'";


if ($con->query($sql1) && $con->query($sql2) && $con->query($sql3) && $con->query($sql4) && $con->query($sql5) && $con->query($sql6) && $con->query($sql7) === TRUE) {
    echo "Record updated successfully";
		echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
} else {
    echo "Error updating record: " . $con->error;
}
}

?>
