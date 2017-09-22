<header>
	<a href="index.php"><h1>Forum</h1></a>

	<ul>
		<li><a href="index.php">Posts</a></li>
		<li><a href="index.php?usr=!token_find">Users</a></li>
		<?php if (isset($_SESSION['209_uid'])): ?>
			<li><a href=<?php echo "index.php?usr=".$_SESSION['209_uid']; ?>><?php echo $_SESSION['209_uid']; ?></a></li>
			<li><a href="signout.inc.php">Sign out</a></li>
		<?php endif ?>
	</ul>	

</header>