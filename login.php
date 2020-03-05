<?php include('server.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>User registration and login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Login</h2>
	</div>
	<form action="login.php" method="POST">
		<!--Display validation errors here-->
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>User name</label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label>password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" name="login" class="btn">Login</button>
		</div>
		<p>
			Not yet a member?<a href="register.php">Sign in</a>
		</p>
	</form>

</body>
</html>
