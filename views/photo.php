<?php # Script 15.3 - index.php
// This is the main page for the site.

// Include the HTML header:
include ('../includes/header_jq.php');

// The content on this page is introductory text
// pulled from the database, based upon the 
// selected language:
echo "<h2>This is your photo album</h2>";
//----------------------------------------------------------------------------------------------------
if(isset($_SESSION['user_id'])){
	//$user_id=mysqli_real_escape_string($dbc,$_POST['user_id']);
	//-----------------------------------------------------------------------
	//you can view your self and your freinds photos
	if(isset($_GET['user_id'])){
		//echo "USER ID through GET is: ".$_GET['user_id'];
	$user_id=mysqli_real_escape_string($dbc, $_GET['user_id']);
	} else{
		$user_id=mysqli_real_escape_string($dbc, $_SESSION['user_id']);
	}
	
	//---------------end of setting user id
	$sql_photo="SELECT title, description, tmp_name FROM photo_uploads WHERE user_id='$user_id'";
	$result_photo=mysqli_query($dbc, $sql_photo);
	if(mysqli_num_rows($result_photo)>0){
		//display the thumnails all the thumbs are wrapped in gallery photoalbum div
		echo "<div id='gallery_photoalbum'>";
				echo"<p>Click the thumbnail to see the larger view.</p>";
		while ($row=mysqli_fetch_assoc($result_photo)){
	
			echo "<div class='photo_thumbstyle'>";
			//echo $row['title'];
		?>
		<a href="../photo_uploads/<?php echo $row['tmp_name']; ?>"  title="<?php echo $row['title']; ?>" >
			<img src="../photo_uploads/<?php echo $row['tmp_name']; ?>" width="120" height="90" />;
			</a>
		<?php	
			echo"</div>";
		}//end of while loop
		echo "</div>";			   
	
	} else{
		echo "<p>There is currently no photos in your album!</p>";
		//need to add conditions user id needs to be the same as session id
		if(!isset($_GET['user_id'])||$_GET['user_id'] ==$_SESSION['user_id'])
		echo "<p><a href='photo_upload.php'>Add some photo now</a></p>";
	}
	

	
	
	
} else{
	echo "You can not view the photos without log in !!";
}

// Include the HTML footer file:
include ('../includes/footer.inc.php');
?>
