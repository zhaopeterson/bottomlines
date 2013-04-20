<?php 
// Include the HTML header:
include ('includes/header_clb.php');


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
	$sql_photo="SELECT photo_id, title, description, tmp_name FROM photo_uploads WHERE user_id='$user_id'";
	$result_photo=mysqli_query($dbc, $sql_photo);
	if(mysqli_num_rows($result_photo)>0){
	//--------------------------------------------add javascript

		//display the thumnails all the thumbs are wrapped in gallery photoalbum div
		echo "<div id='slidebox'>";
				echo"<p>Click the following thumbnail to see the larger view and comments.</p>";
				
				//this one use slide number to name the comment container
		$count=1;
		echo "<p><a href='photo_upload.php'>Add more photo now!</a></p>";
		while ($row=mysqli_fetch_assoc($result_photo)){
			echo "<div class='slides'>";
		//echo $row['photo_id'];
		//include the script of lightbox which open new window
		include('lightboxscript.html');
		//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
		
		
	//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		
		
		?>
        <script type="txet/javascript">
			document.body.getElementById("photocomment_button1").onclick=window.location.reload();
			</script>
	
		<a href="photo_uploads/<?php echo $row['tmp_name']; ?>" id="thumb_link" >
			<img src="photo_uploads/<?php echo $row['tmp_name']; ?>" class="slide" width="120" height="90" alt="<?php echo $row['title']; ?>" />
		</a>
		<?php	
		
			//create the comments
			echo "<div class='cContainer' id='commentContainer_orig".$count."'>";
			echo"<h2 >".$row['title']."</h2>";
			echo"<h3 >".$row['description']."</h3>";
			//echo "The photo id of this slide is: ".$row['photo_id']."<br/>";
			$photo_id=$row['photo_id'];
			//echo "Photo id is: ".$photo_id."<br/>";
			//$photo_idlink=$_GET['photo_id'];
			//query the comment box to retrive the omments
			//**********************************************************************************************new
			
			
			
			//********************************************************************************************
			
			$sql_c="SELECT user_id, username, tmp_name, comment_body, date_commented FROM photo_comments INNER JOIN users USING (user_id) LEFT JOIN profiles USING (user_id) WHERE photo_id='$photo_id'";
			$result_c=mysqli_query($dbc, $sql_c);
			//$row_c=mysqli_fetch_array($result_c);
			//echo $sql_c;
			if(mysqli_num_rows($result_c)>0){//
			//display all the comments
				while($row_c=mysqli_fetch_assoc($result_c)){
				echo "<p class='comment_item'><img src='profile_uploads/".$row_c['tmp_name']."' class='avatar_small' width='30' height='30' /><b><em>".$row_c['username']."</em><b> commented on: ".$row_c['date_commented']."<br/>".$row_c['comment_body']."</p>";
				
				}
				include ('form_photo_comment.php');
				//process the form if it is submitted
				
			}else{
				echo "<p>There is no comments yet, be the first one to comment!</p>";
				include ('form_photo_comment.php');
				
			}
			
			echo "</div>";//end of comment container------------------------------------------------------------------
			$count++;
			echo"</div>";//end of div slides
		}//end of while loop
		//#######################################################################################script to process reply
		//scripts to prcess the photo comments
		if (isset($_POST['submit_photocomment'])){
	     if (!empty($_POST['comment_body'])){
			 $comment_body=$_POST['comment_body'];
			 $photo_id=$_POST['photo_id'];
			 //NSERT INTO threads (lang_id, user_id, subject) VALUES ({$_SESSION['lid']}, {$_SESSION['user_id']}
			 $sql_ci="INSERT INTO photo_comments (photo_id, user_id, comment_body, date_commented) VALUES ('$photo_id', '$user_id','$comment_body', NOW())";
			 //echo $sql_ci;
			 $result_ci=mysqli_query($dbc, $sql_ci);
			 if(mysqli_affected_rows($dbc)==1){
				 echo "<p>Your comment has been added!</p>";
			     echo "<p><a href='photo.php' >View Your comments</a></p>";
			//------------------end of the scripts process comments
			 } else{
				 echo "<p>due to an system erorr, we can not add your comment.<p>";
				 
			 }//end of mysqli affected row photocomment
		
		 } else{
			echo "You need to put in an comment"; 
		 }
			}//end of isset submit_photocomment
		//#######################################################################################################	
		
		echo "</div>";//end of slider div 			   
		
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
include ('includes/footer.inc.php');
?>
