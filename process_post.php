<?php 

if (isset($_POST['submit_post'])) { // Handle the form.

	// Language ID ($lid) is in the session.
	// Validate thread ID ($tid), which may not be present:
	$tid2 = FALSE;
	if (isset($_POST['tid']) && is_numeric($_POST['tid']) ) {
		$tid2 = (int) $_POST['tid'];
		if ($tid2 <= 0) { 
			$tid2 = FALSE;
		}
	}

	// If there's no thread ID, a subject must be provided:
	if (!$tid2 && empty($_POST['subject_post'])) {
		$subject_post = FALSE;
		echo '<p>Please enter a subject for this post.</p>';
	} elseif (!$tid2 && !empty($_POST['subject_post'])) {
		$subject_post = htmlspecialchars(strip_tags($_POST['subject_post']));
	} else { // Thread ID, no need for subject.
		$subject_post = TRUE;
	}
	
	// Validate the body:
	if (!empty($_POST['body_post'])) {
		$body_post = htmlentities($_POST['body_post']);
	} else {
		$body_post = FALSE;
		echo '<p>Please enter a body for this post.</p>';
	}
	
	if ($subject_post && $body_post) { // OK!
	

		
		if (!$tid2) { // Create a new thread.
			$q_post = "INSERT INTO threads (lang_id, user_id, subject) VALUES ({$_SESSION['lid']}, {$_SESSION['user_id']}, '" . mysqli_real_escape_string($dbc, $subject_post) . "')";
			$r_post = mysqli_query($dbc, $q_post);
			if (mysqli_affected_rows($dbc) == 1) {
				$tid2 = mysqli_insert_id($dbc);
			} else {
				echo '<p>Your post could not be handled due to a system error.</p>';
			}

		} 
		
		if ($tid2) { // Add this to the replies table:

			$q_post = "INSERT INTO posts (thread_id, user_id, message, posted_on) VALUES ($tid2, {$_SESSION['user_id']}, '" . mysqli_real_escape_string($dbc, $body_post) . "', UTC_TIMESTAMP())";
			$r_post = mysqli_query($dbc, $q_post);
			if (mysqli_affected_rows($dbc) == 1) {
				echo '<p>Your post has been entered.</p>';
			} else {
				echo '<p>Your post could not be handled due to a system error.</p>';
			}

		}
	
	} else { // Include the form:

	}

} else { // Display the form:


}


?>
