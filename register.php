<?php
// Start the session:
session_start();


// Need the database connection:
require_once('./includes/mysqli_connect.php');

$reg_errors = array();
//require('../includes_mas/login.inc.php');

// Check for a form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Check for a username:
	if (preg_match ('/^[A-Z0-9]{2,30}$/i', $_POST['username'])) {
		$u = mysqli_real_escape_string ($dbc, $_POST['username']);
	} else {
		$reg_errors['username'] = '<span class="warning">Please enter a desired username!</span>';
	}
	
	// Check for an email address:
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$e = mysqli_real_escape_string ($dbc, $_POST['email']);
	} else {
		$reg_errors['email'] = '<span class="warning">Please enter a valid email address!</span>';
	}

	// Check for a password and match against the confirmed password:
	if (preg_match ('/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,20}$/', $_POST['pass1']) ) {
		if ($_POST['pass1'] == $_POST['pass2']) {
			$p = mysqli_real_escape_string ($dbc, $_POST['pass1']);
		} else {
			$reg_errors['pass2'] = '<span class="warning">Your password did not match the confirmed password!</span>';
		}
	} else {
		$reg_errors['pass1'] = '<span class="warning">Please enter a valid password!</span>';
	}
	//get the value of timezone
	 if(!empty($_POST['timezone_id'])){
  $timezone=$_POST['timezone_id']; 
  }else{
	 $reg_errors['timezone_id']="You need to select a timezone"; 
	
  }
	 if(!empty($_POST['lang_id'])){
  $language=$_POST['lang_id']; 
  }else{
	 $reg_errors['lang_id']="You need to select a language"; 
	 
  }
	
	
	if (empty($reg_errors)) { // If everything's OK...

		// Make sure the email address and username are available:
		$q = "SELECT email, username FROM users WHERE email='$e' OR username='$u'";
		$r = mysqli_query ($dbc, $q);
		
		// Get the number of rows returned:
		$rows = mysqli_num_rows($r);
		
		if ($rows == 0) { // No problems!

			// Sets expiration to yesterday:
			$q = "INSERT INTO users (lang_id, time_zone,  username, email, pass, date_signup) VALUES ('$language','$timezone',  '$u', '$e', '"  .  sha1($p) .  "',  NOW() )";
			
			$r = mysqli_query ($dbc, $q);

			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
	
				$uid = mysqli_insert_id($dbc);

				header('Location: '.'login1.php');
				exit(); // Stop the page.
				
			} else { // If it did not run OK.
				trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
			}
			
		} else { // The email address or username is not available.
			
			if ($rows == 2) { // Both are taken.
				
				$reg_errors['email'] = 'This email address has already been registered. If you have forgotten your password, use the link at right to have your password sent to you.';			
				$reg_errors['username'] = 'This username has already been registered. Please try another.';			

			} else { // One or both may be taken.

				// Get row:
				$row = mysqli_fetch_array($r, MYSQLI_NUM);
									
				if( ($row[0] == $_POST['email']) && ($row[1] == $_POST['username'])) { // Both match.
					$reg_errors['email'] = 'This email address has already been registered. If you have forgotten your password, use the link at right to have your password sent to you.';	
					$reg_errors['username'] = 'This username has already been registered with this email address. If you have forgotten your password, use the link at right to have your password sent to you.';
				} elseif ($row[0] == $_POST['email']) { // Email match.
					$reg_errors['email'] = 'This email address has already been registered. If you have forgotten your password, use the link at right to have your password sent to you.';						
				} elseif ($row[1] == $_POST['username']) { // Username match.
					$reg_errors['username'] = 'This username has already been registered. Please try another.';			
				}
					
			} // End of $rows == 2 ELSE.
			
		} // End of $rows == 0 IF.
		
	} // End of empty($reg_errors) IF.

} // End of the main form submission conditional.


include ('includes/header.php');

// The content on this page is introductory text
// pulled from the database, based upon the 
// selected language:
echo "<h2>Sign Up now to join the largest anti-social network in the world, we will never sell your privacy without charging you big bucks!!</h2><br/>";
include ('includes/form_functions.inc_r.php');

include('includes/register_form.inc.php');


// Include the HTML footer file:
include ('includes/footer.inc.php');
?>
