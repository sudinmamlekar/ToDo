<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Registration and login system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bg-img">

  <div class="header">
  	<h2>Login</h2>
  </div>
  <div>
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group" >
		<label>Username</label>
	</div>
	<div>
		<input type="text" name="username" placeholder="User Name" style="width:93%;" pattern="[a-zA-Z0-9]+" required>
		<span class="errors" style="width:5%;">* </span>
	</div>
  	<div class="input-group">
		  <label>Password</label>
	</div>
	<div>
  		<input type="password" name="password" required placeholder="Password" style="width:93%;">
		  <span class="errors" style="width:5%;">*</span>
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
	 <P>
	  Not yet a member? <a href="registration.php">Sign up</a>
	  </p>
  </form>
</div>
</body>
</html>