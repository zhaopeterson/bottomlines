<?php
// Include the HTML header:
include ('includes/header.php');
// The content on this page is introductory text
// pulled from the database, based upon the 
// selected language:
echo "<h2>Your private messages</h2>";
if(isset($_GET['pmtid'])){
	$pmtid=$_GET['pmtid'];
	echo $_GET['pmtid'];
$sql_dpm="SELECT user_id, pm_body, pm_send FROM pm_posts WHERE pmthread_id='$pmtid'";
echo $sql_dpm;
$result_dpm=mysqli_query($dbc, $sql_dpm);
if(mysqli_num_rows($result_dpm)>0){
	while($row=mysqli_fetch_assoc($result_dpm)){
		echo "<p>The person: ".$row['user_id']."send you the message on: ".$row['pm_send']."</p>";
		echo "<p>".$row['pm_body']."</p>";
	}
		
} else {
	echo  "WE can not display the messages due to a system error.";
}

} else{
	echo "You have reached this page by error";
}

// Include the HTML footer file:
include ('includes/footer.inc.php');
?>
