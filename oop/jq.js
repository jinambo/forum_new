$(document).ready(function() {

	//=SET CONTENT=
	$("#post_form").submit(function(e) {
		e.preventDefault();

		var post_content = $("#post_content").val();
		var post_title = $("#post_title").val();

		$("#post_content").css("border-color", "#aaa");
		$("#post_title").css("border", "1px solid #aaa");

		if (post_content.length == 0 && post_title == 0) {

			$("#post_content").css("border-color", "var(--red)");
			$("#post_title").css("border", "1px solid var(--red)");
		}

		else if (post_content.length == 0) {

			$("#post_content").css("border-color", "var(--red)");
		}

		else if (post_title.length == 0) {
			
			$("#post_title").css("border", "1px solid var(--red)");
		}

		else {


			$.ajax({

				method: "POST",
				data: {title:post_title ,content:post_content, setContent_call:true},
				url: "posts.inc.php",
				success: function(response) {

					if (response == "Err_post_empty") {

						alert("Your post is empty!");
					}

					else if (response == "Err_post_long") {

						alert("Your post/title is too long, shorten it!");
					}

					else {

						$("#post_content").val("");
						$("#post_title").val("");
						window.location.href = "index.php?pa=" + post_title;
					}
				},
				error: function() {

					alert("There was an error posting your message!");
				}
			});
		}
	});

	//=GET CONTENT=
	setInterval(function() {

		$.ajax({

			method: "POST",
			data: {getContent_call:true},
			url: "posts.inc.php",
			success: function(response) {

				$("#user_posts").html(response);
			}
 		});

	}, 5000);

	//=SET COMMENT=
	$("#form_comment_art").submit(function(e) {
		e.preventDefault();

		var comment = $("#content_comment_art").val();
		var master_id = $("#mid_comment_art").val();

		$("#content_comment_art").css("border-color", "#aaa");
		if (comment.length == 0) {

			$("#content_comment_art").css("border-color", "var(--red)");
			alert("Can not post empty comments!");
		}

		else {

			$.ajax({

				method: "POST",
				data: {setComment_call:true, content:comment, mid:master_id},
				url: "posts.inc.php",
				success: function(response) {

					if (response == "Err_comment_long") {

						alert("Your comment is too long!");
					}

					else if (response == "Err_comment_empty") {

						alert("Your comment is empty!");
					}

					else {
						
						var current_msg = $("#article_comment_div_top").html();

						$("#article_comment_div_top").hide().html(response).fadeIn(300).append(current_msg);
						$("#content_comment_art").val("");
					}
				},
				error: function() {

					alert("There was an error proccessing your comment!");
				}
			});
		}
	});

	//=GET USER=
	$("#form_user_search").submit(function(e) {
		e.preventDefault();

		var username = $("#uid_user_search").val();

		$.ajax({

			method: "POST",
			url: "users.inc.php",
			data: {showUsr_call:true ,uid:username},
			success: function(response) {

				if (response == "") {

					alert("User " + username + " not found!");
				}

				else {

					$("#div_user_search").html(response);
				}
			}
		});

	});

	//=SET PRIVATE MESSAGE=
	$("#form_private_message").submit(function(e) {
		e.preventDefault();

		var pm_content = $("#content_private_message").val();
		var pm_master = $("#mid_private_message").val();

		$.ajax({

			method: "POST",
			url: "users.inc.php",
			data: {setPm_call:true, content:pm_content, mid:pm_master},
			success: function(response) {

				if(response == "Err_mid_invalid") {

					alert("User " + pm_master + " does not exist!");
				}

				else if (response == "Err_pm_empty") {

					alert("Don't send empty messages please.");
				}

				else if (response == "Err_pm_long") {

					alert("Your private message is too long (250 characters max!)");
				}

				else {

					$("#content_private_message").val("");
					$("#mid_private_message").val("");
					$(".pm_sent_succ").show();
				}
			}
		});

	});

});