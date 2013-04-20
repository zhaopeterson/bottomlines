<?php


// Create an empty error array if it doesn't already exist:
if (!isset($login_errors)) $login_errors = array();

// Need the form functions script, which defines create_form_input():
// The file may already have been included (e.g., if this is register.php or forgot_password.php).
//require_once ('includes_mas/form_functions.inc.php');
?>
<form action="" method="post" accept-charset="utf-8">
<p><?php if (array_key_exists('login', $login_errors)) {
	echo '<span class="warning">' . $login_errors['login'] . '</span><br />';
	}?>
    <p class="reg_form"><label for="email">Email Address</label><br/><?php create_form_input('email', 'text', $login_errors); ?></p>
   <p class="reg_form"><label for="pass">Password</label><br /><?php create_form_input('pass', 'password', $login_errors); ?> <a href="forgot_password.php" align="right">Forgot Password?</a></p>
    <p class="reg_form">&#160; &#160; <input type="submit" name="login" value="Log In"></p>
    
    
</form>