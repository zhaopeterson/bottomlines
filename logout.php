<?php
// This is the logout page for the site.
session_start();
// Destroy the session:
$_SESSION = array(); // Destroy the variables.
session_destroy(); // Destroy the session itself.
setcookie (session_name(), '', time()-300); // Destroy the cookie.
header('Location: '.'index.php');

$page_title = 'Logout';

?>
