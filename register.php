<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" href="style.css">
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="js/index.js"></script>
</head>
<body>
<form method="post" action="register.php">
	<h2><center>Register</center></h2>
	<?php echo display_error(); ?>
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>" required autocomplete="off">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value="<?php echo $email; ?>" required autocomplete="off">
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1" required autocomplete="off">
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2" required autocomplete="off">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">Register</button>
	</div>
	<p>
		Already a member? <a href="login.php">Sign in</a>
	</p>
</form>
</body>
</html>