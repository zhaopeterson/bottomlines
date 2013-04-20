<?php
// This page shows the form for posting messages.
// It's included by other pages, never called directly.

// Redirect if this page is called directly:
// Only display this form if the user is logged in:
if (isset($_SESSION['user_id'])) {

	// Display the form:
	echo '<div id="post_form_container">
	<form action="" method="post" accept-charset="utf-8">';

		// Print a caption:
		echo '<h5>Something on your mind, rant and vent!</h5>';
		
		// Create subject input:
		echo '<p id="subject_style">' . 'Subject' . ': <br/><input name="subject_post" type="text" size="15" id="subject_input"';
	
		// Check for existing value:
		if (isset($subject)) {
			echo "value=\"$subject\" ";
		}
		
		echo '/></p>';

	
	// Create the body textarea:
	echo '<p id="body_style"> Message Body: <br/><textarea name="body_post" rows="1" cols="55" id="postbody">';
	
	if (isset($body)) {
		echo $body;
	}
	
	echo '</textarea></p>';
	
	// Finish the form:
	echo '<br/><input name="submit_post" type="submit" value="Post" id="submit_posthp" />
	<input name="submitted" type="hidden" value="TRUE" />
	</form></div>';
	
} else {
	echo '<p>You must be logged in to post messages.</p>';
}

?>
