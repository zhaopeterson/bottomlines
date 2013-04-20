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
<script src="js_script_bl/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js_script_bl/jquery.autocomplete.js" type="text/javascript" charset="utf-8"></script>
<script src="js_script_bl/bigLink.js" type="text/javascript" charset="utf-8"></script>
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
      <input type="button" id="pm_button" name="pm_button" value="<?php echo "3"; ?>" onclick="openPMWindow()" />
      <!--</form>-->
    </div>
    <!--end of PM box-->
    <div id="pm_container">
      <!--js to add the form-->
      <script type="text/javascript">
function addEvent(object, evName, fnName, cap) {
   if (object.attachEvent)
       object.attachEvent("on" + evName, fnName);
   else if (object.addEventListener)
       object.addEventListener(evName, fnName, cap);
}

addEvent(window, "load", setLink, false);
function setLink(){
document.getElementById("sendmessage_link").onclick=openPMForm;
}

function openPMForm(){
	document.getElementById("pm_container").style.display="none";
	document.getElementById("pmform").style.display="block";
	//autocomplete will not work if the div is created using light box
	//var pmForm_lb=document.createElement("div");
	//pmForm_lb.id="pmform_lb";
	//pmForm_lb.innerHTML=document.getElementById("pmform").innerHTML;
	//document.body.appendChild(pmForm_lb);
}

</script>
      <?php
//-------------------------------------------------------------------query database to obtain autocomplete names
$sql_ac="SELECT CONCAT(first_name, ' ', last_name) AS name FROM profiles";
$result_ac=mysqli_query($dbc, $sql_ac);
if(mysqli_num_rows($result_ac)>0){
	$pmnames=array();
	while ($row=mysqli_fetch_assoc($result_ac)){
		$pmnames[]="'".$row['name']."'";	
	}
	$pmnames_arraylist=implode(',', $pmnames);
	//echo $pmnames_arraylist;
}

?>
      <script type="text/javascript">
//---------------------------------------------------------------------------------------------------autocomplete script
 $(document).ready(function(){
//var names = ['James Richson', 'Angela Liu', 'Connie Chang', 'Brooke Peterson', 'Maggie Pretty', 'Joy Gordon', 'Mary Stewart', 'Los Angeles', 'San Francisco', 'London', 'Dubai', 'Madrid', 'Tokyo', 'Hong Kong', 'Sydney'];
  var names=[<?php echo $pmnames_arraylist ?> ];

  $('#name_input').autocomplete(names,{
    autoFill: true,
    selectFirst: true,
    width: '160px'
  });
});
    </script>
      <?php
// process the message form++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$pm_errors=array();
$pm_notices=array();
$user_id=$_SESSION['user_id'];

if (isset($_POST['pm_submit'])){
	//echo "The name through autocomplete is: ".$_POST['name_input'];
  // echo "The send button is clicked";
	if(!empty($_POST['name_input'])){
	$pm_name=mysqli_real_escape_string($dbc,$_POST['name_input']);
	list($pm_firstname, $pm_lastname)=explode(" ", $pm_name);
	//echo "First name you entered is: ".$pm_firstname. "<br/>";
	//echo "Last name you entered is: ".$pm_lastname. "<br/>";
	//search the database for names similar to typed in
	
	//$sql_sn="SELECT user_id, first_name, last_name FROM users INNER JOIN profiles USING (user_id) WHERE first_name LIKE '%$pm_name%' OR last_name LIKE '%$pm_name%'";
	//$q = "SELECT user_id, username FROM users WHERE (email='$e' AND pass='$p')";		
	$sql_sn="SELECT user_id, first_name,  last_name FROM profiles WHERE first_name='$pm_firstname' AND last_name='$pm_lastname'";
  //echo $sql_sn;
	$result_sn=mysqli_query($dbc, $sql_sn);
	if(mysqli_num_rows($result_sn) ==1) {
	$row = mysqli_fetch_assoc($result_sn);
		//echo $row['user_id'];
		//$recipient_id=$row['user_id'];
		//echo "Recipient id is: ".$recipient_id;
	}else{
		$pm_errors['noname_found']="No name found, check the spelling and try again.";
	}
	
} else {
	$pm_errors['name_input']= "You need to put in a name!";	
}//end of validating name

   if(!empty($_POST['message_input'])){
	$pm_body=mysqli_real_escape_string($dbc,$_POST['message_input']);
   } else {
	   //echo "You need to write a message!";
	$pm_errors['message_input']= "You need to put in a message!";	
	//echo $pm_errors['message_input'];
    }//end of validating message

//need to process the freinds id
//$ally_id=9;

//process to insert data if not error ffound
if(empty($pm_errors)){
	$sql_pmp="INSERT INTO pm_threads (user_id, ally1_id) VALUES ('$user_id', '$recipient_id')";
	//echo $sql;
	$result_pmp=mysqli_query($dbc, $sql_pmp);
	if(mysqli_affected_rows($dbc)==1){
		$pmtid = mysqli_insert_id($dbc);
		//echo "Your message is sent.";
		
	} else {
		//echo "We can not send your message now";
	}
	
	
	if($pmtid){
   $sql_pmp="INSERT INTO pm_posts (pmthread_id, user_id, pm_body,  pm_send) VALUES ('$pmtid','$user_id', '$pm_body', NOW())";
	//echo $sql_pmp;
	$result_pmp=mysqli_query($dbc, $sql_pmp);
	if(mysqli_affected_rows($dbc)==1){
		
		$pm_notices['pm_sent']="Your message is sent.";
	} else {
		$pm_notices['pm_sent_no']= "We can not send your message now due to a system error";
	}
	}
	
	
	
	
	
} 




}//end of isset post send button

?>
      <h2>Recent Messages  &#160;   &#160;   &#160; <a href="#" id="sendmessage_link" >Send a New Message</a></h2>
      <?php
//add restriction only the session user can PM on her ownpage
//retrieve the first 5 messages
$pmuser_id=$_SESSION['user_id'];
//-------------------------------------get the person who messaged you------------------------------------------------------------
//retrieve the names of people you sent messages
$sql_sn="SELECT pmthread_id, user_id, ally1_id FROM pm_threads  WHERE user_id='$pmuser_id' OR ally1_id='$pmuser_id'";
//echo $sql_sn;
$result_sn=mysqli_query($dbc,$sql_sn);
if(mysqli_num_rows($result_sn)>0){
	$pm_allies=array();
	$pm_threads=array();
	while($row=mysqli_fetch_assoc($result_sn)){
		$pm_allies[]="'".$row['user_id']."'";
		$pm_threads[]="'".$row['pmthread_id']."'";
	}//end of while loop
	$allieslist=implode(',',$pm_allies);
	//echo "The list of allies who sent messages are: ".$allieslist."<br/>";
     $pm_threadslist=implode(',',$pm_threads);
	 //echo "The list of threads who sent messages are: ".$pm_threadslist."<br/>";

} else {
	echo "There is no private message";
}//end of mysqli_num rowsselect user

		
$sql_last="SELECT pmt.user_id, pmt.ally1_id, pmt.pmthread_id,  MAX(pm_send) AS last FROM pm_threads AS pmt INNER JOIN pm_posts USING (pmthread_id) WHERE pm_posts.pmthread_id IN ($pm_threadslist)  GROUP BY pmthread_id ORDER BY last DESC LIMIT 6";
	

	
$result_last=mysqli_query($dbc, $sql_last);
//obtaine the last o PM message
if(mysqli_num_rows($result_last)>0){
	while ($row=mysqli_fetch_assoc($result_last)){
		//get the value of lst updated
		$last_pm=$row['last'];
		//echo $last_pm."<br/>";
//$sql_lm="SELECT pmthread_id, user_id, pm_body, pm_send, tmp_name, first_name FROM pm_posts  INNER JOIN profiles USING (user_id) WHERE pm_send='$last_pm'";
//for each item do another query to figure out who to whom the message is sent
$sql_lm="SELECT pmt.pmthread_id, pmt.user_id, pmt.ally1_id, pmp.pm_body, pmp.pm_send, p.tmp_name, p.first_name FROM pm_threads AS pmt  INNER JOIN profiles AS p USING (user_id) INNER JOIN pm_posts AS pmp USING (pmthread_id) WHERE pmp.pm_send='$last_pm' ";

	$result_lm=mysqli_query($dbc, $sql_lm);
	echo "<div class='pm_item bigLink'>";
	if(mysqli_num_rows($result_lm)>0){
	
		while($row=mysqli_fetch_assoc($result_lm)){
			
			$recipient_id=$row['ally1_id'];
			//query the profile table to obtain the names
			$sql_rp="SELECT first_name FROM profiles WHERE user_id='$recipient_id'";
		
			$result_rp=mysqli_query($dbc, $sql_rp);
			if(mysqli_num_rows($result_rp)>0){
			$row2 = mysqli_fetch_assoc($result_rp);
			$rep_name=$row2['first_name'];
			//echo $rep_name;
			} else{
				//echo "problem";
				$rep_name="Unknown";
			}
		
		//----------------------------------------------------------------------------------------------------------------	
			//----------------------------------------------------------------------------------------------------------------
				//----------------------------------------------------------------------------------------------------------------
				//add link to 
			echo "<p><img src='profile_uploads/".$row['tmp_name']."  ' class='avatar_small' width='30' height='30' /> on ".$row['pm_send']." to <span class='rep_name'>". $rep_name." </span><br/><a href='display_pm.php?pmtid=".$row['pmthread_id']."'>".$row['pm_body']. "</a></p>";
	
		}//end of inside while

	}
	
			echo "</div>";

	} //end of the while loop
	}else{
		echo "<p>Currently there is no private messages.</p>";
}//endof retriving the records



?>
      <script type="text/javascript">
function closePMContainer(){
	document.getElementById("pm_container").style.display="none";
}
var pmc_closeBtn=document.createElement("input");
pmc_closeBtn.type="image";
pmc_closeBtn.id="closeBtn";
pmc_closeBtn.src="images_bl/pmc_close.png";
pmc_closeBtn.onclick=function(){
	document.getElementById("pm_container").style.display="none";
}
var container=document.getElementById("pm_container");
container.appendChild(pmc_closeBtn);
//document.getElementById("closeBtn").onclick=closePMContainer();
</script>
    </div>
    <!--end of pm contianer-->
    <div id="searchbox">
      <form action="search.php" method="GET" name="searchbox" accept-charset="utf-8">
        <input name="terms" type="text" size="50" id="search_input" />
        <input name="submit_search" type="submit" value= "" id="search_submitbutton" />
      </form>
    </div>
    <!--endof search box-->
    <p class="title"><a href="messages.php?user_id=<?php echo $_SESSION['user_id'] ?> " title="Go back to your own homepage" ><?php echo $words['title']; ?></a></p>
  </div>
  <!--end of header-->
  <!--include th form t send a new private messages############################################################################-->
  <form action="" method="post" name="pmform" id="pmform">
    <h2 id="pmForm_header">New Private Message</h2>
    <?php echo $pm_notices['pm_sent'];
echo $pm_notices['pm_sent_no'];

?>
    <p><span id="ally_name">To: </span>
      <input type="text" name="name_input" id="name_input" />
      <br/>
      <?php echo $pm_errors['name_input'];   ?><?php echo $pm_errors['noname_found'];  ?></p>
    <p><span id="pmessage_to">Message: </span>
      <textarea name="message_input" id="message_input" cols="1" rows="3" ></textarea>
      <br/>
      <?php echo $pm_errors['message_input']; ?></p>
    <p id="buttons_para" >
      <input type="submit" name="pm_submit" value="Send" id="pm_submit" />
      <input type="submit" value="Cancel" id="pm_cancel" />
    </p>
  </form>
  <!--end of the form-->
</div>
<!--end of header wrapper-->
<div id="topnav">
  <!--start of tope nav-->
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
</div>
<!--end of topnav-->
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
					echo "<p class='friend_style'><a href='messages.php?user_id=".$row['friend_id']."' ><img src='images_profiles/noimage.jpg' class='friend_small' width='50' height='50' /></a><br/> Mysterious Ally</p>";
				}else{
					//echo $row['name'];
				echo "<p class='friend_style'><a href='messages.php?user_id=".$row['friend_id']."' ><img src='profile_uploads/".$row['tmp_name']." ' width='50' height='50' class='friend_small' /></a><br/>".$row['name']."</p>";
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
  </div>
  <!--end of left nav inner-->
</div>
<!--end of leftnav-->
<div id='main_content'>
<div id='main_content_inner'>
