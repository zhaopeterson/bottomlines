<?php # Script 15.1 - header.html
/* This script...
 * - starts the HTML template.
 * - indicates the encoding using header().
 * - starts the session.
 * - gets the language-specific words from the database.
 * - lists the available languages.
 */

// Indicate the encoding:
header ('Content-Type: text/html; charset=UTF-8'); 

// Start the session:
session_start();
echo "My session_Id is: ".$_SESSION['user_id'];

// For testing purposes:
//$_SESSION['user_id'] = 1;
//$_SESSION['user_tz'] = 'America/New_York';
//$_SESSION = array();

// Need the database connection:
require_once('./includes/mysqli_connect.php');

// The language ID is stored in the session.
// Check for a new language ID...
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
<div id="header_wrapper">
<div id="header">
<p class="title"><?php echo $words['title']; ?></p>
</div>
</div><!--end of header wrapper-->
<div id="content">
<div id="leftnav">
<?php // Display links:

// Default links:
echo '<a href="index.php" class="navlink">' . $words['home'] . '</a><br />
<a href="forum.php" class="navlink">' . $words['forum_home'] . '</a><br />';

// Display links based upon login status:
if (isset($_SESSION['user_id'])) {

	// If this is the forum page, add a link for posting new threads:
	if (stripos($_SERVER['PHP_SELF'], 'forum.php')) {
		echo '<a href="post.php" class="navlink">' . $words['new_thread'] . '</a><br />';
	}
	
	// Add the logout link:
	echo '<a href="logout.php" class="navlink">' . $words['logout'] . '</a><br />';
	
} else {

	// Register and login links:
	echo '<a href="register.php" class="navlink">' . $words['register'] . '</a><br />
	<a href="login.php" class="navlink">' . $words['login'] . '</a><br />';
	
}

// For choosing a forum/language:
echo '</b><p><form action="forum.php" method="get">
<select name="lid">
<option value="0">' . $words['language'] . '</option>
';

// Retrieve all the languages...
$q = "SELECT lang_id, lang FROM languages ORDER BY lang_eng ASC";
$r = mysqli_query($dbc, $q);
if (mysqli_num_rows($r) > 0) {
	while ($menu_row = mysqli_fetch_array($r, MYSQLI_NUM)) {
		echo "<option value=\"$menu_row[0]\">$menu_row[1]</option>\n";
	}
}
mysqli_free_result($r);
unset($menu_row);

echo '</select><br />
<input name="submit" type="submit" value="' . $words['submit'] . '" />
</form></p>
';
?>
</div><!--end of leftnav-->
<div id="main_content">
<div id="main_content_inner">
