<?php 
	include 'users.inc.php'; 
	include 'posts.inc.php';
?>

<div class="user_div">
	<?php getInf($conn, $_GET['usr']); ?>
	
	<?php if ($_GET['usr'] == $_SESSION['209_uid']): ?>
		<br>
		<form id="post_form">
			<h3>Create a new post</h3>
			<input type="text" id="post_title" placeholder="Title...">
			<br>
			<textarea id="post_content" placeholder="Content..."></textarea>
			<br>
			<button class="btn" type="submit">Submit</button>
		</form>
		<br><br>
		<form id="form_private_message">
			<h3>Send PM</h3>
			<p>From : <?php echo $_SESSION['209_uid']; ?></p>
			<label for="reciever">To : </label>
			<input type="text" name="reciever" id="mid_private_message">
			<br>
			<textarea id="content_private_message" placeholder="Message..."></textarea>
			<br>
			<button class="btn" type="submit">Send</button><span class="pm_sent_succ" style="display: none;"> Sent!</span>
		</form>

		<div id="div_private_message">
			<h2>Inbox</h2>
			<?php getPm($conn, $_SESSION['209_uid']); ?>
		</div>

	<?php else: ?>

		<?php if ($_GET['usr'] == "!token_find"): ?>

			<form id="form_user_search">
				<h2>Find user</h2>
				<input type="text" id="uid_user_search">
				<button type="submit">Find</button>
			</form>
			<div id="div_user_search">
				
			</div>

			<style type="text/css"> .invalid { display:none; } </style>			

		<?php else: ?>

			<form id="form_private_message">
				<br>
				<h3>Send PM</h3>
				<p>From : <?php echo $_SESSION['209_uid']; ?></p>
				<p>To : <?php echo $_GET['usr']; ?></p>
				<input type="hidden" id="mid_private_message" value=<?php echo $_GET['usr']; ?>>
				<br>
				<textarea id="content_private_message" placeholder="Message..."></textarea>
				<br>
				<button class="btn" type="submit">Send</button><span class="pm_sent_succ" style="display: none;"> Sent!</span>
			</form>
			
			<div id="user_posts">
				<?php getContent($conn, $_GET['usr']); ?>
			</div>

			<script src="jquery.js"></script>
			<script type="text/javascript">
				
				if ($("#username_h1").attr("class") == "invalid") {

					$("#form_private_message").hide();
				}

			</script>

		<?php endif ?>

	<?php endif ?>

</div>