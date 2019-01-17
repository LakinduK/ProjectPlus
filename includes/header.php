<nav class="navbar navbar-default">
	<div class="container-fluid" style="background-color: #5cb85c;">
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
			$get_user = "select * from users where user_email='$user'";
			$run_user = mysqli_query($con,$get_user);
			$row=mysqli_fetch_array($run_user);

			$user_id = $row['user_id'];
			$user_name = $row['user_name'];
			$first_name = $row['f_name'];
			$last_name = $row['l_name'];
			$describe_user = $row['describe_user'];
			$user_pass = $row['user_pass'];
			$user_email = $row['user_email'];

			$user_birthday = $row['user_birthday'];
			$user_image = $row['user_image'];
			$user_cover = $row['user_cover'];
			$recovery_account = $row['recovery_account'];
			$register_date = $row['user_reg_date'];
				$user_batch = $row['batch'];
					$user_degree = $row['degree'];

			$user_posts = "select * from posts where user_id='$user_id'";
			$run_posts = mysqli_query($con,$user_posts);
			$posts = mysqli_num_rows($run_posts);

			?>

	        <li><a href='profile.php?<?php echo "u_id=$user_id" ?>'><?php echo "$first_name"; ?></a></li>
	       	<li><a href="home.php">Home</a></li>



					<?php
						echo"

						<li class='dropdown'>
							<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span><i class='glyphicon glyphicon-chevron-down'></i></span></a>
							<ul class='dropdown-menu'>
								<li>
									<a href='profile1.php?u_id=$user_id'>Edit Account</a>
								</li>
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
