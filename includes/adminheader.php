<?php
include("includes/connection.php");
include("functions/functions.php");
?>
<nav class="navbar navbar-default">
	<div class="container-fluid" style="background-color: #24292e;">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>

		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav" >
					<a  href="home.php" ><img src="includes/logo.png" style="border: 0;
					    width: 96px;
					    float: left;"/></a>

	      	<?php
			$user = $_SESSION['user_email'];
			$get_admin = "SELECT * FROM admin WHERE admin_email='$user'";
			$run_admin = mysqli_query($con,$get_admin);
			$row=mysqli_fetch_array($run_admin);

			$admin_id = $row['id'];
			$admin_pass = $row['admin_password'];
			$admin_email = $row['admin_email'];

			?>

	        <li><a href="adminprofile.php">Profile</a></li>
	       	<li><a href="adminhome.php">Home</a></li>
					<?php
						echo"
						<li class='dropdown-menu'>

							<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span><i class='glyphicon glyphicon-chevron-down'></i></span></a>
							<ul class='dropdown-menu'>
								<li role='separator' class='divider'></li>
								<li>
									<a href='logout.php'>Logout</a>
								</li>
							</ul>
						</li>
						";

					?>


				</li>
			</ul>
		</div>
	</div>
</nav>
