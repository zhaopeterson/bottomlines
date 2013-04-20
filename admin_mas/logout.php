<?php

// This is the logout page for the site.
// This script is created in Chapter 4.

// Require the configuration before any PHP code as the configuration controls error reporting:
require ('../includes_mas/config.inc.php');
// The config file also starts the session.

// If the user isn't logged in, redirect them:
//redirect_invalid_user();

// Destroy the session:
$_SESSION = array(); // Destroy the variables.
session_destroy(); // Destroy the session itself.
setcookie (session_name(), '', time()-300); // Destroy the cookie.

// Include the header file:
$page_title = 'Logout';
//include ('Location: http://www.rzgraphic.com');

// Print a customized message:
$message= '<h3>Logged Out</h3><p>Thank you for visiting. You are now logged out. Please come back soon!</p>';

// Footer file needs the database connection:
//require (MYSQL);

// Include the HTML footer:
//include ('../includes/footer.html');
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
<h2>This is the log out page</h2>
<p>&#160;</p>
<h3><?php echo $message ?></h3>

<p>&#160;</p>
<p>&#160;</p>

<p>&#160;</p>
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