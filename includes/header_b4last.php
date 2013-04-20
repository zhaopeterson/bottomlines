<?php # Script 15.1 - header.html
/* This script...
 * - starts the HTML template.
 * - indicates the encoding using header().
 * - starts the session.
 * - gets the language-specific words from the database.
 * - lists the available languages.
 */

// Indicate the encoding:
//header ('Content-Type: text/html; charset=UTF-8'); 

// Start the session:
session_start();

// For testing purposes:
//$_SESSION['user_id'] = 1;
//$_SESSION['user_tz'] = 'America/Los Angeles';
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
<script type="text/javascript">
function openPMWindow(){
	//alert("You clicked Me");
	document.getElementById("pm_container").style.display="block";
}

<!--document.getElementById("pm_button").onclick=openPMWindow();-->

</script>
<div id="pm_box">
<!--<form action="" method="post" name="privatemessage">-->
<input type="button" id="pm_button" name="pm_button" value="" onclick="openPMWindow()" />

<!--</form>-->

</div><!--end of PM box-->
<div id="pm_container">
<script type="text/javascript">
function addEvent(object, evName, fnName, cap) {
   if (object.attachEvent)
       object.attachEvent("on" + evName, fnName);
   else if (object.addEventListener)
       object.addEventListener(evName, fnName, cap);
}

addEvent(window, "load", setLink, false);
function setLink(){
document.getElementById("sendmessage_link").onclick=createPMForm;
}

function createPMForm(){
	document.getElementById("pm_container").style.display="none";
	//alert("I am trying to create a form")
	var pmForm=document.createElement("form");
	pmForm.action="";
	pmForm.method="post";
	pmForm.id="pmform";
	var pmForm_header=document.createElement("h2");
	pmForm_header.id="pmForm_header";
	pmForm_header.innerHTML="New Message";
	pmForm.appendChild(pmForm_header);
	//---------------------------end of creating header
	var name_para=document.createElement("p");
	var name=document.createElement("span");
	name.id="ally_name";
	name.innerHTML="To: ";
	
	var name_input=document.createElement("input");
	name_input.id="name_input";
	name_input.name="name_input";

	name_para.appendChild(name);
	name_para.appendChild(name_input);
	pmForm.appendChild(name_para);
	var pmessage=document.createElement("span");
	pmessage.id="pmessage_to";
	pmessage.innerHTML="Message: ";
	
	var message_input=document.createElement("textarea");
	message_input.id="message_input";
	message_input.name="message_input";
	var message_para=document.createElement("p")
	message_para.appendChild(pmessage);
	message_para.appendChild(message_input);
	pmForm.appendChild(message_para);
	
	var buttons_para=document.createElement("p");
	buttons_para.id="buttons_para";
	var pm_submitBtn=document.createElement("input");
	pm_submitBtn.type="submit";
	pm_submitBtn.name="pm_submit";
	pm_submitBtn.id="pm_submit";
	pm_submitBtn.value="Send"
	buttons_para.appendChild(pm_submitBtn);
	var pm_cancelBtn=document.createElement("input");
	pm_cancelBtn.type="submit";
	pm_cancelBtn.name="pm_cancel";
	pm_cancelBtn.id="pm_cancel";
	pm_cancelBtn.value="Cancel";
	buttons_para.appendChild(pm_cancelBtn);
	pmForm.appendChild(buttons_para);
	//append the form to the body
	document.body.appendChild(pmForm);
}

</script>
<?php
// process the message form
$pm_errors=array();
$user_id=$_SESSION['user_id'];

if (isset($_POST['pm_submit'])){
   echo "The send button is clicked";
	//if(empty($_POST['name_input'])){
	//$pm_name=mysqli_real_escape_string($dbc,$_POST['name_input']);
//} else {
	//$pm_errors['name_input']= "You need to put in a name!";	
//}//end of validating name

   if(!empty($_POST['message_input'])){
	$pm_body=mysqli_real_escape_string($dbc,$_POST['message_input']);
   } else {
	   //echo "You need to write a message!";
	$pm_errors['message_input']= "You need to put in a message!";	
	
    }//end of validating message

//need to process the freinds id
$ally_id=13;

//process to insert data if not error ffound
if(empty($pm_errors)){
	$sql_pmp="INSERT INTO pm_threads (user_id, ally1_id) VALUES ('$user_id', '$ally_id')";
	//echo $sql;
	$result_pmp=mysqli_query($dbc, $sql_pmp);
	if(mysqli_affected_rows($dbc)==1){
		$pmtid = mysqli_insert_id($dbc);
		echo "Your message is sent.";
	} else {
		echo "We can not send your message now";
	}
	
	
	if($pmtid){
   $sql_pmp="INSERT INTO pm_posts (pmthread_id, user_id, pm_body,  pm_send) VALUES ('$pmtid','$user_id', '$pm_body', NOW())";
	echo $sql_pmp;
	$result_pmp=mysqli_query($dbc, $sql_pmp);
	if(mysqli_affected_rows($dbc)==1){
		
		echo "Your message body is sent.";
	} else {
		echo "We can not send your message now due to a system error";
	}
	}
	
	
	
	
	
} 




}//end of isset post send button

?>
<?php //echo out error message
if (isset($_POST['pm_submit'])){
echo $pm_errors['message_input']; 
}
?>

<h2>Private Messages  &#160;   &#160;   &#160;   <a href="#" id="sendmessage_link";>Send a New Message</a></h2>
<?php
//retrieve the first 5 messages
$sql_pmbox="SELECT pmthread_id, pm_posts.user_id, ally1_id, pm_body, pm_send, MAX(pm_send) AS last FROM pm_threads INNER JOIN pm_posts USING (pmthread_id) GROUP BY pmthread_id ORDER BY last DESC";
$result_pmbox=mysqli_query($dbc, $sql_pmbox);
//echo $sql_pmbox;
if(mysqli_num_rows($result_pmbox)>0){
	while ($row=mysqli_fetch_assoc($result_pmbox)){
		echo "<div id='pm_item'>";//add a wrapper for each message
		echo "<p>The body was from the first message".$row['pmthread_id']." User_id: ". $row['user_id']." ".$row['pm_body']." ".$row['last']."<br/>";
		echo "</div>";
	} //end of the while loop
	}else{
		echo "Currently there is no private messages.";
}

?></div><!--end of pm contianer-->
<div id="searchbox">
<form action="search.php" method="GET" name="searchbox" accept-charset="utf-8">
<input name="terms" type="text" size="50" id="search_input" />
<input name="submit_search" type="submit" value= "" id="search_submitbutton" />
</form>
</div><!--endof search box-->
<p class="title"><a href="messages.php?user_id=<?php echo $_SESSION['user_id'] ?> " title="Go back to your own homepage" ><?php echo $words['title']; ?></a></p>

</div>
</div><!--end of header wrapper-->
<div id="topnav"><!--start of tope nav-->
<ul>
<?php // Display links:

// Default links:
//echo '<li><a href="index.php" >' . $words['home'] . '</a></li>';


// Display links based upon login status:
if (isset($_SESSION['user_id'])) {
	if(isset($_GET['user_id'])){
		//echo "USER ID through GET is: ".$_GET['user_id'];
	$user_id=mysqli_real_escape_string($dbc, $_GET['user_id']);
	} else{
		$user_id=mysqli_real_escape_string($dbc, $_SESSION['user_id']);
	}
echo '<li><a href="messages.php?user_id='.$user_id. '" >Messages</a></li>';
	// If this is the forum page, add a link for posting new threads:
	
echo '<li><a href="profile.php?user_id='.$user_id. '" >Profile</a></li>';
echo '<li><a href="Photo.php?user_id='.$user_id. '">Photo</a></li>';
echo '<li><a href="Video.php?user_id='.$user_id. '">Video</a></li>';
	
	// Add the logout link:
	echo '<li><a href="logout.php">Log Out</a></li>';
	
} else {

	// Register and login links:
	echo '<li><a href="register.php">Register</a><li>';
	echo '<a href="login.php" >' . $words['login'] . '</a></li>';
	
}


?>
</ul>
</div><!--end of topnav-->

<div id="content">
<div id="leftnav">
<div id="leftnav_inner">
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
	$q="SELECT profiles.user_id, species, interests, tmp_name, username, CONCAT(first_name,' ', last_name) AS name FROM profiles, users WHERE profiles.user_id=users.user_id AND profiles.user_id='$user_id'";
	$r=mysqli_query($dbc, $q);
	//$row=mysqli_fetch_assoc($r);
	if(mysqli_num_rows($r) > 0){
	       while($row=mysqli_fetch_array($r, MYSQLI_ASSOC)){
			   
		echo "<p><b>".$row['name']."</b></p>";
		if(!isset($_GET['user_id']) || $_GET['user_id']==$_SESSION['user_id']){
		echo "<p><a href='profile_update.php?user_id=".$row['user_id']."' >Edit Profile</a></p>";
		}
		echo "<p><img src='profile_uploads/".$row['tmp_name']."' class='avatar_style' width='120' height='120' /></p>";
		
		echo "<p class='species_style' >Species: ".$row['species']."</p>";
		echo "<p class='interests_style' >".$row['interests']."</p>";
		
		if(!isset($_GET['user_id']) || $_GET['user_id']==$_SESSION['user_id']){
		echo "<p><a href='displayphoto.php?user_id=".$row['user_id']."' >Photos</a></p>";
		echo "<p><a href='displayinfo.php?user_id=".$row['user_id']."' >Info</a></p>";
		echo "<p><a href='displaynotes.php?user_id=".$row['user_id']."' >Notes</a></p>";
		}
		
		echo "<h2 class='ally_border'>Allies with</h2>";
	//*********************************************************************************************************************	
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
			//echo $friends_list;
			
			//obtain the photo from the profile table with user_id in friends//
			
			
		$qf="SELECT u.user_id, f.user_id AS friend_id, CONCAT(p.first_name,' ', p.last_name) AS name, p.tmp_name AS tmp_name FROM            users AS u LEFT JOIN profiles AS p ON u.user_id=p.user_id LEFT JOIN friends AS f ON f.user_id=p.user_id  WHERE            u.user_id IN ($friends_list) GROUP BY u.user_id";
		$rf=mysqli_query($dbc, $qf);
		if(mysqli_num_rows($rf)>0){
			while($row=mysqli_fetch_assoc($rf)){
				//echo $row['user_id'];
				if(!$row['name']){
					//echo "";
					echo "<p class='friend_style'><a href='messages.php?user_id=".$row['friend_id']."' ><img src='images_profiles/noimage.jpg' class='friend_small' width='50' height='50'></a><br/> Mysterious Ally</p>";
				}else{
					//echo $row['name'];
				echo "<p class='friend_style'><a href='messages.php?user_id=".$row['friend_id']."' ><img src='profile_uploads/".$row['tmp_name']." ' width='50' height='50' class='friend_small'/></a><br/>".$row['name']."</p>";
				}
			}
		}//end of mysqli num rows FRIENDS
		
		
		}else{
			echo "No allies now. This is anti-social network, we do not need freinds! Get some allies though, they will help you rant and vent!!";
		}

		   }//end of $row=mysqli_fetch_array($r, MYSQLI_ASSOC)
		 
	}else{
		if(!isset($_GET['user_id'])){
		echo "<p>&#160;</p>
	     <p>No profile available.</p>
		<p>Create your profile now!</p>
		<p><a href='profile_update.php?user_id=$user_id' >Create Profile</a></p>";
		//} else{//end of no isset
		
		}
	}//end of mysqli_num_rows
	
} else{
	echo "You have not registered/or login yet yet!";
}
?>

</div><!--end of left nav inner-->
</div><!--end of leftnav-->
<div id='main_content'>
<div id='main_content_inner'>
