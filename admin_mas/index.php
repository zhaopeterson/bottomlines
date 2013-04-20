<?php

// This is the registration page for the site.
// This file both displays and processes the registration form.
// This script is begun in Chapter 4.

// Require the configuration before any PHP code as the configuration controls error reporting:
require ('../includes_mas/config.inc.php');
// The config file also starts the session.

// Include the header file:
$page_title = 'Register';
//include ('./includes/header.html');

// Require the database connection:
require ('../includes_mas/connection.inc2.php');

// For storing registration errors:
$reg_errors = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include ('./includes_mas/login.inc.php');
}

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
<h2>After Login</h2>
<p>&#160;</p>
This is the homepage after you registered
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