<?php 

// This is the login page for the site.
// It's included by index.php, which receives the login form data.
// This script is created in Chapter 4.
session_start();
include('../includes_mas/connection.inc2.php');
// Array for recording errors:
$login_errors = array();



// Validate the email address:
if(isset($_POST['login'])){
	//echo "login is clicked";
if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	$e = mysqli_real_escape_string ($dbc, $_POST['email']);
} else {
	$login_errors['email'] = 'Please enter a valid email address!';
}

// Validate the password:
if (!empty($_POST['pass'])) {
	$p = mysqli_real_escape_string ($dbc, $_POST['pass']);
} else {
	$login_errors['pass'] = 'Please enter your password!';
}


if (empty($login_errors)) { // OK to proceed!

	// Query the database:
	$q = "SELECT id, username, type, IF(date_expires >= NOW(), true, false) FROM users WHERE (email='$e' AND pass='"  .  get_password_hash($p) .  "')";		
	$r = mysqli_query ($dbc, $q);
	
	if (mysqli_num_rows($r) == 1) { // A match was made.
		
		// Get the data:
		$row = mysqli_fetch_array ($r, MYSQLI_NUM); 
		//echo "row[2] from database is: ".$row[2];
		// If the user is an administrator, create a new session ID to be safe:
		// This code is created at the end of Chapter 4:
		if ($row[2] == 'admin') {
			
			session_regenerate_id(true);
			$_SESSION['user_admin'] = true;	
		} else{
			$_SESSION['user_admin'] = false;	
		}
			
			
		
		// Store the data in a session:
		$_SESSION['user_id'] = $row[0];
		//echo "session user-id is set : ".$_SESSION['user_id'];
		$_SESSION['username'] = $row[1];
		//$_SESSION['user_admin'] = false;
		//echo $_SESSION['username'];
		// Only indicate if the user's account is not expired:
		if ($row[3] == 1) $_SESSION['user_not_expired'] = true;
		if(!$_SESSION['user_admin']){
			//echo "not admin".$_SESSION['user_admin'];
		header('Location: '.'../uploads_mas/upload_images.php');
		
		}else{
			//echo "is admin".$_SESSION['user_admin'];
			header('Location: '.'../blog_mas/blog_list.php');
		}
	} else { // No match was made.
		$login_errors['login'] = 'The email address and password do not match those on file.';
	}
	
} // End of $login_errors IF.
}//end of isset login

// Omit the closing PHP tag to avoid 'headers already sent' errors!
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

<h2>Your Password has been sent</h2>
<p>Your password to log into MaggieArtStudio.com has been temporarily changed. Please log in using that password (we sent you via email) and this email address. Then you may change your password to something more familiar.</p>
<?php require ('../includes_mas/login_form.inc2.php');
?>
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