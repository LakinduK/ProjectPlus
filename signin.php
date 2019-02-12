<!DOCTYPE html>
<html>
<head>
	<title>Signin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/allstyle.css">
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<style>
	body{
		overflow-x: hidden;

	}
	.main-content{
		width: 32%;
		height: 60%;
		margin: 22px auto;
		background-color: #24292e;
		border: 2px solid #e6e6e6;
		padding: 40px 50px;
		margin-right: 73px;
		opacity: 1;
	}
	.header{
		border: 0px solid #000;
		margin-bottom: 5px;
	}
	.well{
		background-color: #24292e;
	}
	#signin{
		width: 60%;
		border-radius: 30px;
		background-color: #187FAB;
	}
	.overlap-text{
		position: relative;
	}
	.overlap-text a{
		position: absolute;
		top: 8px;
		right: 10px;
		font-size: 14px;
		text-decoration: none;
		font-family: 'Overpass Mono', monospace;
		letter-spacing: -1px;

	}
	.button{
		color: white;
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
<body>
<div class="row">
	<div class="col-sm-12">
		<div class="well">
			<center><img src="includes/logo.png" style=" width: 190px;" /></center>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="main-content">
			<div class="header">
				<h3 style="text-align: center; color: #bababa;" strong>Login to Project+</strong></h3>
			</div>
			<div class="l-part">
				<form action="" method="post">
					<input type="email" name="email" placeholder="Email" required="required" class="form-control input-md"><br>
					<div class="overlap-text">
						<input type="password" name="pass" placeholder="Password" required="required" class="form-control input-md" style="width: 100%;"><br>

					</div>

					<center><button id="signin" class="button" name="login" style="background-color: #000000;">Login</button></center>
					<?php include("login.php"); ?>
				</form>
			</div>
		</div>
	</div>
</div>
</body>

</html>
