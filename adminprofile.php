<!DOCTYPE html>
<?php
session_start();
include("includes/adminheader.php");
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style/allstyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style/home_style2.css">
  <style type="text/css">
  .button {
  background-color: #24292e;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}

.button:hover {opacity: 1}
  </style>
</head>
<body>

<?php
include 'includes/connection.php';

      $user= $_SESSION['user_email'];
 ?>
<div style="text-align: center;">
<div class="delete_data">
  <h3>Delete Record</h3>
  <form name="delete_form" action="adminprofile.php?id=<?php echo $admin_id; ?>" method="get" >

	  <input type="text" name="uname" placeholder="username for delete"><br>
	   <input type="submit" name="delete" value="delete" class="button" >
   </form>
   <?php deleteuser(); ?>
</div>
<h3>Create User</h3>
<div class="create_user">
  <form name="create_form" action="adminprofile.php" method="post">

    <input type="text" name="uemail" placeholder="email"/><br />

    <input type="password" name="upsw" placeholder="password"><br />

    <input type="text" name="uname" placeholder="username" ><br>
    <input type="submit" name="sub_btn" value="submit" class="button">
  </form></div>
  <?php insertuser(); ?>
</div>


</body>

</html>
