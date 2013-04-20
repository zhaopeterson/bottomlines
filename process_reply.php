<?php
//prosess reply
 if (isset($_POST['submitted'])) { // Handle the form.

	// Language ID ($lid) is in the session.
	// Validate thread ID ($tid), which may not be present:
	$tid = FALSE;
	if (isset($_POST['tid']) && is_numeric($_POST['tid']) ) {
		echo "The thread id is: ".$tid;
		$tid = (int) $_POST['tid'];
		if ($tid <= 0) { 
			$tid = FALSE;
		}
	}

		$subject = htmlspecialchars(strip_tags($_POST['subject']));

	// Validate the body:
	if (!empty($_POST['body'])&&isset($_POST['submitted'])) {
		$body = htmlentities($_POST['body']);
	} else {
		$body = FALSE;
		echo '<p>Please enter a body for this reply.</p>';
	}
	
	if ( $body) { // OK!
	
		// Add the message to the database...
		
		if (!$tid) { // Create a new thread.
			$qrp = "INSERT INTO threads (lang_id, user_id, subject) VALUES ({$_SESSION['lid']}, {$_SESSION['user_id']}, '" . mysqli_real_escape_string($dbc, $subject) . "')";
			$rrp = mysqli_query($dbc, $qrp);
			if (mysqli_affected_rows($dbc) == 1) {
				$tid = mysqli_insert_id($dbc);
			} else {
				echo '<p>Your post could not be handled due to a system error.</p>';
		}

		} 
		
		if ($tid) { // Add this to the replies table:

			$qrp = "INSERT INTO posts (thread_id, user_id, message, posted_on) VALUES ($tid, {$_SESSION['user_id']}, '" . mysqli_real_escape_string($dbc, $body) . "', UTC_TIMESTAMP())";
			$rrp = mysqli_query($dbc, $qrp);
			if (mysqli_affected_rows($dbc) == 1) {
				echo '<p>Your reply has been entered.</p>';
				
			} else {
				echo '<p>Your post could not be handled due to a system error.</p>';
			}

		}
	}

}//end of isset submit
?>