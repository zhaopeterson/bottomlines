<?php # Script  - post_form.php

// Only display this form if the user is logged in:
if (isset($_SESSION['user_id'])) {

	// Display the form:
	echo '<form action="" method="post" accept-charset="utf-8">';
	
	// If on read.php...
	if (isset($photo_id) && $photo_id) {
	
		// Print a caption:
		echo '<h5>Post your comments here</h5>';
		
		// Add the thread ID as a hidden input:
		echo '<input name="photo_id" type="hidden" value="' . $photo_id . '" />';
	}
	// Create the body textarea:
	echo '<p> <textarea id="comment_textarea" name="comment_body" rows="1" cols="50">';
	
	if (isset($body)) {
		echo $body;
	}
	
	echo '</textarea></p>';
	
	// Finish the form:
	echo '<input name="submit_photocomment" type="submit" value="Reply" id="photocomment_button1" />
	<input name="submitted" type="hidden" value="TRUE" />
	</form>';
	
} else {
	echo '<p>You must be logged in to post messages.</p>';
}

?>
