<?php

// This page is used to reset a forgotten password.
// A new password is generated and sent to the registered email address.
// This script is created in Chapter 4.

// Require the configuration before any PHP code as the configuration controls error reporting:
require ('../includes_mas/config.inc.php');
// The config file also starts the session.

// Include the header file:
$page_title = 'Forgot Your Password?';
//include ('./includes/header.html');

// Require the database connection:
require ('../includes_mas/connection.inc2.php');

// For storing errors:
$pass_errors = array();

// If it's a POST request, handle the form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Validate the email address:
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	
		// Check for the existence of that email address...
		$q = 'SELECT id FROM users WHERE email="'.  mysqli_real_escape_string ($dbc, $_POST['email']) . '"';
		$r = mysqli_query ($dbc, $q);
		
		if (mysqli_num_rows($r) == 1) { // Retrieve the user ID:
			list($uid) = mysqli_fetch_array ($r, MYSQLI_NUM); 
		} else { // No database match made.
			$pass_errors['email'] = 'The submitted email address does not match those on file!';
		}
		
	} else { // No valid address submitted.
		$pass_errors['email'] = 'Please enter a valid email address!';
	} // End of $_POST['email'] IF.
	
	if (empty($pass_errors)) { // If everything's OK.

		// Create a new, random password:
		$p = substr(md5(uniqid(rand(), true)), 15, 15);

		// Update the database:
		$q = "UPDATE users SET pass='" .  get_password_hash($p) . "' WHERE id=$uid LIMIT 1";
		$r = mysqli_query ($dbc, $q);
		
		if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
		
			// Send an email:
			$body = "Your password to log into <whatever site> has been temporarily changed to '$p'. Please log in using that password and this email address. Then you may change your password to something more familiar.";
			mail ($_POST['email'], 'Your temporary password.', $body, 'From: admin@maggieartstudio.com');
			
			// Print a message and wrap up:
			$message= '<h3>Your password has been changed.</h3><p>You will receive the new, temporary password via email. Once you have logged in with this new password, you may change it by clicking on the "Change Password" link.</p>';
			header('Location: '.'password_sent.php');
			exit(); // Stop the script.
			
		} else { // If it did not run OK.
	
			trigger_error('Your password could not be changed due to a system error. We apologize for any inconvenience.'); 

		}

	} // End of $uid IF.

} // End of the main Submit conditional.

// Need the form functions script, which defines create_form_input():
require ('../includes_mas/form_functions.inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Maggie Art Studio About</title>
<link href="../stylesheets_mas/css_reset.css" rel="stylesheet" type="text/css" />
<link href="../stylesheets_mas/global.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="header_wrapper">
<?php
include('../includes_mas/header.inc.php');
?>
</div>
<div id="content">
<div id="leftnav">

</div>
<div id="main_content">
<div id="main_content_inner">

<h2>Reset Your Password</h2>
<p>Enter your email address below to reset your password.</p> 
<form action="forgot_password.php" method="post" accept-charset="utf-8">
	<p><label for="email"><strong>Email Address</strong></label><br /><?php create_form_input('email', 'text', $pass_errors); ?></p>
	<input type="submit" name="submit_button" value="Reset &rarr;" id="submit_button" class="formbutton" />
</form>

</div><!--end of main nner-->
</div><!--end of main-->
</div><!--end of content-->
<div id="footer_wrapper">
<?php
include('../includes_mas/footer.inc.php');
?>
</div>
</body>
</html>