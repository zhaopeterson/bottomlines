<?php 
// Include the HTML header:
include ('includes/header.php');

// The content on this page is introductory text
// pulled from the database, based upon the 
// selected language:
echo "<h2>Your private messages</h2>";
if(isset($_GET['pmtid'])){
	$pmtid=$_GET['pmtid'];
	//echo $_GET['pmtid'];
//process the form
$user_id=$_SESSION['user_id'];
if (isset($_POST['send_pm2'])){
	if(!empty($_POST['pm_body2'])){
		$pm_body2=mysqli_real_escape_string($dbc, $_POST['pm_body2']);
		
	} else{
	echo "<p>You need to add a message.</p>";	
	}
	
	
$sql_replypm="INSERT INTO pm_posts (pmthread_id, user_id, pm_body) VALUES ('$pmtid','$user_id','$pm_body2')";
$result_replypm=mysqli_query($dbc, $sql_replypm);
if(mysqli_affected_rows($dbc)==1) {
	echo "<p>The reply has sent.</p>";
} else{
	echo "<p>We can not send your reply due to a system error.</p>";
}

}

//retrive the previous messages	
$sql_dpm="SELECT pm_posts.user_id, pm_body, pm_send, tmp_name FROM pm_posts LEFT JOIN profiles USING (user_id) WHERE pmthread_id='$pmtid'";
//echo $sql_dpm;
$result_dpm=mysqli_query($dbc, $sql_dpm);
if(mysqli_num_rows($result_dpm)>0){
	
	while($row=mysqli_fetch_assoc($result_dpm)){
		echo "<div class='display_pmitem'>";
		echo "<p><img src='profile_uploads/".$row['tmp_name']."' class='avatar_small' width='40' height='40' />User_id: ".$row['user_id']." wrote: ".$row['pm_send']."<br/>";
		echo $row['pm_body']."</p>";
		echo "</div>";
	}//end of while loop
	
} else {
	echo  "WE can not display the messages due to a system error.";
}
	
} else{
	echo "You have reached this page by error";
}

//display a form to send messages
echo '<form action="" method="post" accept-charset="utf-8">';
	// Create the body textarea:
	echo '<p> <textarea id="pm_textarea" name="pm_body2" rows="1" cols="50">';
	
	if (isset($body)) {
		echo $body;
	}
	
	echo '</textarea></p>';
	
	// Finish the form:
	echo '<input name="send_pm2" type="submit" value="Reply" id="replybox_button1" />
	<input name="submitted" type="hidden" value="TRUE" />
	</form>';

// Include the HTML footer file:
include ('includes/footer.inc.php');
?>
