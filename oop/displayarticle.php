<?php include 'posts.inc.php'; ?>

<article>
	<?php 
		showArt($conn); 
	?>
</article>
<section>
	<?php if (isset($_SESSION['209_uid'])): ?>
		<form id="form_comment_art">
			<h3>Create a comment</h3>
			<textarea id="content_comment_art" placeholder="Comment..."></textarea>
			<input type="hidden" id="mid_comment_art" value=<?php echo $_GET['art'] ?>>
			<br>
			<button class="btn" type="submit">Comment</button>
		</form>
	<?php endif ?>
	<div id="article_comment_div">
		<span id="article_comment_div_top"></span>
		<?php showcomment_Art($conn); ?>
	</div>
</section>