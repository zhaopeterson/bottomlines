<?php # Script  - index.php
// This is the main page for the site.
$reg_errors = array();
$login_errors = array();

// Start the session:
session_start();

// Need the database connection:
require_once('includes/mysqli_connect.php');

if (isset($_GET['lid']) && is_numeric($_GET['lid'])) {
	$_SESSION['lid'] = (int) $_GET['lid'];
} elseif (!isset($_SESSION['lid'])) {
	$_SESSION['lid'] = 1; // Default.
}

// Get the words for this language.
$words = FALSE; // Flag variable.
if ($_SESSION['lid'] > 0) {
	$q = "SELECT * FROM words WHERE lang_id = {$_SESSION['lid']}";
	$r = mysqli_query($dbc, $q);
	if (mysqli_num_rows($r) == 1) {
		$words = mysqli_fetch_array($r, MYSQLI_ASSOC);
	}
}

// If we still don't have the words, get the default language:
if (!$words) {
	$_SESSION['lid'] = 1; // Default.
	$q = "SELECT * FROM words WHERE lang_id = {$_SESSION['lid']}";
	$r = mysqli_query($dbc, $q);
	$words = mysqli_fetch_array($r, MYSQLI_ASSOC);
}

mysqli_free_result($r);

if(isset($_SESSION['user_id'])){
	header('Location: '.'messages.php');
}



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

} else {
	$login_errors['pass'] = 'Please enter your password!';
}

//the following scripts are for login
if (empty($login_errors)) { // OK to proceed!
	$q = "SELECT user_id, username FROM users WHERE (email='$e' AND pass='$p')";		
	$r = mysqli_query ($dbc, $q);

	if (mysqli_num_rows($r) == 1) { // A match was made.		
		$row = mysqli_fetch_array ($r, MYSQLI_NUM); 
		if ($row[2] == 'admin') {		
			session_regenerate_id(true);
			$_SESSION['user_admin'] = true;	
		} else{
			$_SESSION['user_admin'] = false;	
		}

		$_SESSION['user_id'] = $row[0];

		$_SESSION['username'] = $row[1];

		if ($row[3] == 1) $_SESSION['user_not_expired'] = true;
		if(!$_SESSION['user_admin']){
			//echo "not admin".$_SESSION['user_admin'];
		header('Location: '.'messages.php?user_id='.$_SESSION['user_id']);
		
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
//###############################################################################################################################################
//process registration
$reg_errors = array();


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
			$reg_errors['pass2'] = '<span class="warning">Your password did not match the confirmed password!<span>';
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


?>
<?php include ('includes/form_functions.inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $words['title']; ?></title>
<link href="css_stylesheets/css_reset.css" rel="stylesheet" type="text/css" />
<link href="css_stylesheets/global_bl.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header_wrapper_index">
  <div id="header">
    <p class="title2"><?php echo $words['title']; ?></p>
    <div id="login_area">
      <?php
include('includes/login_form.inc.php');
?>
    </div>
    <!--end of login area--> 
  </div>
</div>
<!--end of header wrapper-->
<div id="content_index">
  <div id="leftpromo">
    <h2>&#160; Stay Disengaged</h2>
    <h2>&#160; &#160; &#160; &#160; Join the largest anti-social network<br/>
      &#160; &#160; &#160; &#160; in the world!</h2>
  </div>
  <!--end of leftnav-->
  <div id="main_registration">
    <div id="main_registration_inner">
      <h2>Sign Up</h2>
      <p>It will never be free -- free to sell your privacy!</p>
      <p>testing</p>
      <form action="" method="post" accept-charset="utf-8" >
        <p class="signup_para">
          <label for="username"><strong>Username: &#160; &#160; </strong></label>
          <?php create_form_input('username', 'text', $reg_errors); ?>
        </p>
        <span class="reg_note"> (Only letters and numbers are allowed.)</span>
        <p class="signup_para">
          <label for="email"><strong>Email Address: &#160; &#160; </strong></label>
          <?php create_form_input('email', 'text', $reg_errors); ?>
        </p>
        <p class="signup_para">
          <label for="pass1"><strong>Password: &#160; &#160; </strong></label>
          <?php create_form_input('pass1', 'password', $reg_errors); ?>
        </p>
        <span class="reg_note"> (Must be between 6 and 20 characters long, with at least one lowercase letter, one uppercase letter, and one number.)</span>
        <p class="signup_para">
          <label for="pass2"><strong>Confirm  &#160; &#160; Password: &#160; &#160; </strong></label>
          <?php create_form_input('pass2', 'password', $reg_errors); ?>
        </p>
        <p class="signup_para">
          <label for="timezone"><strong>Timezone: </strong></label>
          <select name="timezone_id" id="timezone_id">
            <?php
 //get the list of genres
 $getTimezone='SELECT timezone_id, timezone_name FROM timezones ORDER BY timezone_name';
 echo $getTimezone;
 $timezons=mysqli_query($dbc, $getTimezone);
 while($row=mysqli_fetch_assoc($timezons)){
	 ?>
            <option value="America/Los_Angeles">America/Los_Angeles</option>
            <option value="<?php echo $row['timezone_id']; ?>"
     <?php
	 if ($row['timezone_id']==$timezone_id){
		 echo 'selected';
	 }
 ?>><?php echo $row['timezone_name']; ?></option>
            <?php } ?>
          </select>
        </p>
        <p class="signup_para">
          <label for="language"><strong>Language: </strong></label>
          <select name="lang_id" id="lang_id">
            <?php
 //get the list of genres
 $getLanguage='SELECT lang_id, lang_eng FROM languages ORDER BY lang_id';
 $languages=mysqli_query($dbc,$getLanguage);
 while($row=mysqli_fetch_assoc($languages)){
	 ?>
            <option value="<?php echo $row['lang_id']; ?>"
     <?php
	 if ($row['lang_id']==$lang_id){
		 echo 'selected';
	 }
 ?>><?php echo $row['lang_eng']; ?></option>
            <?php } ?>
          </select>
        </p>
        <p class="signup_para"></p>
        <p align="center">
          <input type="submit" name="submit_button" value="Sign Up" id="signup_index" class="formbutton" />
        </p>
      </form>
    </div>
    <!--end of registration inner--> 
  </div>
  <!--end of main content--> 
  
</div>
<!--end of content-->
<div id="footer_wrapper">
  <div id="footer">&copy; 2011 Bottomlines.com &#160; &#160; &#160; &#160; It will never be free -- free to sell your privacy!</div>
</div>
</body>
</html>