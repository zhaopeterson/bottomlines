<?php 
// Start the session:
session_start();

// Need the database connection:
require_once('./includes/mysqli_connect.php');

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
	$p = sha1(mysqli_real_escape_string ($dbc, $_POST['pass']));
	//echo $p;
} else {
	$login_errors['pass'] = 'Please enter your password!';
}

//the follwoing scripts ar for login
if (empty($login_errors)) { // OK to proceed!

	// Query the database:
	$q = "SELECT user_id, username FROM users WHERE (email='$e' AND pass='$p')";		
	$r = mysqli_query ($dbc, $q);

	if (mysqli_num_rows($r) == 1) { // A match was made.
		
		// Get the data:
		$row = mysqli_fetch_array ($r, MYSQLI_NUM); 

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

		// Only indicate if the user's account is not expired:
		if ($row[3] == 1) $_SESSION['user_not_expired'] = true;
		if(!$_SESSION['user_admin']){
			//echo "not admin".$_SESSION['user_admin'];
		header('Location: '.'messages.php');
		
		}else{
			//echo "is admin".$_SESSION['user_admin'];
			header('Location: '.'search.php');
		}
	} else { // No match was made.
	    header('Location: '.'login.php');
		$login_errors['login'] = 'The email address and password do not match those on file.';
	}
	
} // End of $login_errors IF.
}//end of isset login
include ('includes/header.php');

// The content on this page is introductory text
// pulled from the database, based upon the 
// selected language:
echo "<h3>You might typed in the wrong email address or password, try again below: </h3><br/>";
include ('includes/form_functions.inc.php');

include('includes/login_form.inc2.php');


// Include the HTML footer file:
include ('includes/footer.inc.php');
?>
