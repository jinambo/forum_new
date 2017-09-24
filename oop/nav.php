<nav>
	<div class="sign _in">
		<h3>Sign in</h3>
		<form action="signin.inc.php" method="POST">
			<input type="text" name="uid" placeholder="Username">	
			<br>
			<input type="password" name="pwd" placeholder="Password">
			<br>
			<button class="btn" type="submit">Sign in</button>	
		</form>
	</div>
	<br>
	<div class="sign _up">
		<h3>Sign up</h3>
		<form action="signup.inc.php" method="POST">
			<input type="email" name="em" placeholder="E-mail">	
			<br>
			<input type="text" name="uid" placeholder="Username">	
			<br>
			<input type="password" name="pwd" placeholder="Password">
			<br>
			<button class="btn" type="submit">Sign up</button>	
		</form>
	</div>
</nav>