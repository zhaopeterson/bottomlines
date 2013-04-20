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
<p class="title"><a href="welcome.php?user_id=<?php echo $_SESSION['user_id'] ?> " title="Go back to your own homepage" ><?php echo $words['title']; ?></a></p>
</div>
</div><!--end of header wrapper-->
<div id="topnav"><!--start of tope nav-->
<ul>
<?php // Display links:

// Default links:
echo '<li><a href="index.php" class="navlink">' . $words['home'] . '</a></li>';
echo '<li><a href="welcome.php" class="navlink">' . $words['forum_home'] . '</a></li>';

// Display links based upon login status:
if (isset($_SESSION['user_id'])) {

	// If this is the forum page, add a link for posting new threads:
	if (stripos($_SERVER['PHP_SELF'], 'welcome.php')) {
		echo '<li><a href="post.php" class="navlink">' . $words['new_thread'] . '</a></li>';
	}
	
	// Add the logout link:
	echo '<li><a href="logout.php" class="navlink">' . $words['logout'] . '</a></li>';
	
} else {

	// Register and login links:
	echo '<li><a href="register.php" class="navlink">' . $words['register'] . '</a><br />
	<a href="login.php" class="navlink">' . $words['login'] . '</a></li>';
	
}


?>
</ul>
</div><!--end of topnav-->

<div id="content">
<div id="leftnav">
<!--content of user profile goes here-->
<?php
if (isset($_SESSION['user_id'])){
	//echo "user_id is:".$_SESSION['user_id'];
	//if the link get clicked change the user_id so the profile will change accordingly
	if(isset($_GET['user_id'])){
	$user_id=mysqli_real_escape_string($dbc, $_GET['user_id']);
	} else{
		$user_id=mysqli_real_escape_string($dbc, $_SESSION['user_id']);
	}
	//echo $user_id;
	$q="SELECT profiles.user_id, species, avatar, interests, username, CONCAT(first_name,' ', last_name) AS name FROM profiles, users WHERE profiles.user_id=users.user_id AND profiles.user_id='$user_id'";
	$r=mysqli_query($dbc, $q);
	//$row=mysqli_fetch_assoc($r);
	if(mysqli_num_rows($r) > 0){
	       while($row=mysqli_fetch_array($r, MYSQLI_ASSOC)){
			   
		echo "<p><b>".$row['name']."</b></p>";
		if(!isset($_GET['user_id']) || $_GET['user_id']==$_SESSION['user_id']){
		echo "<p><a href='profile.php?user_id=".$row['user_id']."' >Edit Profile</a></p>";
		}
		echo "<p><img src='images_profiles/".$row['avatar']."' class='avatar_style' width='120' height='120' /></p>";
		
		echo "<p>Species: ".$row['species']."</p>";
		echo "<p>".$row['interests']."</p>";
		
		
		echo "<h2>Friends with</h2>";
		
		//query the freinds table see if there are any friends on the list
		//echo $user_id;
		$q_uf="SELECT user_id, userfriend_id FROM friends WHERE user_id='$user_id'";
		//echo $q_uf;
		$r_uf=mysqli_query($dbc, $q_uf);
		//echo $r_uf;
		if(mysqli_num_rows($r_uf)>0){
			//echo "You have friends!";
			$friends=array();
			while($row=mysqli_fetch_assoc($r_uf)){
			$friends[]="'".$row['userfriend_id']."'";
			}
			//echo var_dump($friends); suceessfully retrieve the freinds user id
			$friends_list=implode(',',$friends);
			echo $friends_list;
			
			//obtain the photo from the profile table with user_id in friends
		$qf="SELECT u.user_id, CONCAT(p.first_name,' ', p.last_name) AS name, p.avatar AS avatar FROM users AS u LEFT JOIN profiles AS p ON u.user_id=p.user_id LEFT JOIN friends AS f ON f.user_id=p.user_id  WHERE u.user_id IN ($friends_list) GROUP BY u.user_id";
		$rf=mysqli_query($dbc, $qf);
		if(mysqli_num_rows($rf)>0){
			while($row=mysqli_fetch_assoc($rf)){
				echo $row['user_id'];
				if(!$row['avatar']){
					echo "<p>No Name</p>";;
					echo "<p><img src='images_profiles/noimage.jpg' width='60' height='60'></p>";
				}else{
					echo $row['name'];
				echo "<p><img src='images_profiles/".$row['avatar']." ' width='60' height='60' ></p>";
				}
			}
		}//end of mysqli num rows FRIENDS
		
		
		}else{
			echo "No friends wih anyway now. Who needs friends, this is anti-social network!";
		}
		
		
		
		
		
		
		
		   }//end of $row=mysqli_fetch_array($r, MYSQLI_ASSOC)
		 
	}else{
		if(!isset($_GET['user_id'])){
		echo "<p>&#160;</p>
		<p>Create your profile now!</p>
		<p><a href='profile.php?user_id=$user_id' >Create Profile</a></p>";
		} else{//end of no isset
		echo "No profile available.";
		}
	}//end of mysqli_num_rows
	
} else{
	echo "You have not registered yet!";
}

?>
</div><!--end of leftnav-->
<div id="main_content">
<div id="main_content_inner">
