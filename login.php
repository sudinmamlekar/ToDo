<?php
include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="js/index.js"></script>
</head>
<body>
	<form method="post" action="login.php">
<h2><center>Login</center></h2>
		<?php echo display_error(); ?>
		 <div class="input-group">
			<label>Username</label>
			<input type="text" name="username" required autocomplete="off" >
		</div>

		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" required autocomplete="off">
		</div>
		 <div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
</body>
</html>