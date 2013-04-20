<?php
// This page shows the form for posting messages.
// It's included by other pages, never called directly.

// Redirect if this page is called directly:
if (!isset($words)) {
	header ("Location: "."index.php");
	exit();
}

// Only display this form if the user is logged in:
if (isset($_SESSION['user_id'])) {

	// Display the form:
	echo '<form action="post.php" method="post" accept-charset="utf-8">';
	
	// If on read.php...
	if (isset($tid) && $tid) {
	
		// Print a caption:
		echo '<h5>' . $words['post_a_reply'] . '</h5>';
		
		// Add the thread ID as a hidden input:
		echo '<input name="tid" type="hidden" value="' . $tid . '" />';
		
	} else { // New thread
	
		// Print a caption:
		echo '<h3>' . $words['new_thread'] . '</h3>';
		
		// Create subject input:
		echo '<p><em>' . $words['subject'] . '</em>: <input name="subject" type="text" size="60" maxlength="100" ';
	
		// Check for existing value:
		if (isset($subject)) {
			echo "value=\"$subject\" ";
		}
		
		echo '/></p>';
		
	} // End of $tid IF.
	
	// Create the body textarea:
	echo '<p> <textarea name="body" rows="2" cols="50">';
	
	if (isset($body)) {
		echo $body;
	}
	
	echo '</textarea></p>';
	
	// Finish the form:
	echo '<input name="submit" type="submit" value="Reply" /><input name="submitted" type="hidden" value="TRUE" />
	</form>';
	
} else {
	echo '<p>You must be logged in to post messages.</p>';
}

?>
