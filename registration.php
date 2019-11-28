<?php include('server.php');
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body  class="bg-img">
  <div class="header">
  	<h2>Register</h2>
  </div>
 <div>	
  <form method="post" action="registration.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
		</div>
		<div>

  	  <input type="text" name="username" placeholder="User Name"  value="<?php echo $username; ?>" style="width:92%;" pattern="[a-zA-Z0-9]+" required>
		<span class="errors" style="width:5%;">* </span>
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
		</div>
		<div>
  	  <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" style="width:92%;" = required >
		<span class="errors" style="width:5%;">*</span>
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
		</div>
		<div>
  	  <input type="password" name="password_1" placeholder="Password" style="width:92%;" required>
		<span class="errors" style="width:5%;">* </span>	
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
		</div>
		<div>
  	  <input type="password" name="password_2" placeholder="Confirm Password" style="width:92%;" required>
		<span class="errors" style="width:5%;">* </span>	
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</div>
</body>
</html>