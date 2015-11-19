<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<section class="loginform cf">
		<form method="POST" action="connectivity.php">
			<ul>
				<li>
					<label for="usermail">Email</label>
					<input type="email" name="EmailID" placeholder="yourname@email.com" required>
				</li>
				<li>
					<label for="password">Password</label>
					<input type="password" name="password" placeholder="password" required></li>
				<li>
					<input type="submit" value="Login">
					&nbsp;
				</li>
			</ul>
		</form>
		<form method="POST" action="register.php">
			<ul>
				<li>
					<input type="submit" value="Sign Up">
				</li>
			</ul>
		</form>
	</section>
</body>
</html>