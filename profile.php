<?php

// Include the HTML header:
//session_start();
include ('includes/header.php');
$profile_errors=array();

?>
<?php
//******************************************************************************************************************


if(isset($_SESSION['user_id'])){
	//check if the user id is from session or from get URL
		if(isset($_GET['user_id'])){
		//echo "USER ID through GET is: ".$_GET['user_id'];
	$user_id=mysqli_real_escape_string($dbc, $_GET['user_id']);
	} else{
		$user_id=mysqli_real_escape_string($dbc, $_SESSION['user_id']);
	}

	$sql_pe="SELECT user_id FROM profiles WHERE user_id='$user_id'";
	$result_pe=mysqli_query($dbc, $sql_pe);
	if(mysqli_num_rows($result_pe)>0){
			//echo "Yes, we found your profile";	
			//display the record
			$sql_ped="SELECT u.user_id, u.username, u.email, CONCAT(p.first_name, ' ',p.last_name) AS name, p.species, p.interests, p.education, p.languages FROM users AS u INNER JOIN profiles AS p USING (user_id) WHERE u.user_id=$user_id";
			$result_ped=mysqli_query($dbc, $sql_ped);
			while($row=mysqli_fetch_assoc($result_ped)){
				echo "<h2>This is what you have on file: </h2><br/>";
				echo "<p class='profile_record'><span class='profile_label'>Name: </span>".$row['name']."</p>";
				echo "<p class='profile_record'><span class='profile_label'>Userame: </span>".$row['username']."</p>";
				echo "<p class='profile_record'><span class='profile_label'>Contact: </span>".$row['email']."</p>";
				echo "<p class='profile_record'><span class='profile_label'>Species: </span>".$row['species']."</p>";
				echo "<p class='profile_record'><span class='profile_label'>Interests: </span>".$row['interests']."</p>";
				echo "<p class='profile_record'><span class='profile_label'>Education: </span>".$row['education']."</p>";
				echo "<p class='profile_record'><span class='profile_label'>Languages: </span>".$row['languages']."</p>";
			}
			

			
			
//------------------------------------------------------------------------------------------------------
//if no records found show the form and process the form
			
	}else{
		echo "<h2>Create Your Profile Here</h2><br/>";
	//echo "No profile on record, please fill in the form below:";
if(isset($_POST['submit_profile'])){
	$user_id=$_SESSION['user_id'];
	//the following two vadilate the input fields, make sure it is 
	if(!empty($_POST['first_name'])){
		$first_name=mysqli_real_escape_string($dbc, strip_tags($_POST['first_name']));
		//echo $first_name."<br/>";
	} else{
		$profile_errors['first_name']='Please enter your first name!';
	}//end of check $_POST[first-name} input
						   
	if(!empty($_POST['last_name'])){
	$last_name=mysqli_real_escape_string($dbc, strip_tags($_POST['last_name']));
	//echo $last_name."<br/>";
	} else{
		$profile_errors['last_name']='Please enter your last name!';
	}//end of check $_POST[title} input
						   
    if(!empty($_POST['species'])){
	$species=mysqli_real_escape_string($dbc, strip_tags($_POST['species']));
	//echo $species."<br/>";
	} else{
		$profile_errors['species']='Please enter your last name!';
	}//end of check $_POST[title} input
	
	if(!empty($_POST['interests'])){
	$interests=mysqli_real_escape_string($dbc, strip_tags($_POST['interests']));
	//echo $interests."<br/>";
	} else{
		$profile_errors['interests']='Please enter your last name!';
	}//end of check $_POST[title} input
						   
	if(!empty($_POST['education'])){
	$education=mysqli_real_escape_string($dbc, strip_tags($_POST['education']));
	//echo $education."<br/>";
	} else{
		$profile_errors['education']='Please enter your education!';
	}//end of check $_POST[title} input
						   
	if(!empty($_POST['languages'])){
	$languages=mysqli_real_escape_string($dbc, strip_tags($_POST['languages']));
	//echo $language."<br/>";
	} else{
		$profile_errors['education']='Please enter your languages!';
	}//end of check $_POST[title} input
	
	//if(isset($_FILES['image'])){
		//echo "there is a file name";
	//}
	//check to see if the input name 'image' is in the $_FILES array
	if(is_uploaded_file($_FILES['image']['tmp_name'])&&($_FILES['image']['error']==UPLOAD_ERR_OK)){
		//echo "The file name is: ".$_FILES['image'];
		$image_file=$_FILES['image'];			
		$image_size=ROUND($image_file['size']/1024);
		//check the size if it is too large
		if($image_size>1024){
			$profile_errors['image']='The uploaded file was too large.';		//image is the name of the input field to upload the image files
		}
		//check if is the right type
		$permitted_filetypes=array('image/jpeg', 'image/png', 'image/gif');
		if(!in_array($image_file['type'], $permitted_filetypes) && ((substr($image_file['name'], -4) !== 'jpeg' ) ||(substr($image_file['name'], -4) !== '.png' ) ||(substr($image_file['name'], -4) !== '.gif' ) )){
			$profile_errors['image']='The uploaded file was not a image type -- jpg, png or gif format';		
		}
		//if there is no error, create the file's new name and destination:
		if(!array_key_exists('image', $profile_errors)){
			$tmp_name=sha1($image_file['name'].uniqid('',true));
			$destination='profile_uploads/'.$tmp_name.'_tmp';
			//move the file  $image_file=$_FILES['image'] as defined previously
			if(move_uploaded_file($image_file['tmp_name'], $destination)){
			$_SESSION['image']['tmp_name']=$tmp_name; //$tmp_name is defined three lines above which is encrypted
			$_SESSION['image']['size']=$image_size;
			$_SESSION['image']['file_name']=$image_file['name'];
			//echo '<h4>The file has been successfully uploaded!</h4>';	
			} else{
				trigger_error('Due to a system error, we can not upload your image now.');
				unlink($image_file['tmp_name']);	//remove the uploaded file so it does not cluttering up the temporary directory.		  
			}//end of move_uploaded_file	
		}//end of array-key-exist  IF
	}elseif (!isset($_SESSION['image'])){//no uploaded file
		switch($_FILES['image']['error']){
			case 1:
			case 2:
			$profile_errors['image']='The uploaded file was too large.';
			break;
			case 3:
			$profile_errors['image']='The file was only partially uploaded.';
			break;
			case 6:
			case 7:
			case 8:
			$profile_errors['image']='The file cound not be uploaded due to a system error.';
			break;
			case 4:
			default:
			$profile_errors['image']='No file was uploaded.';
			break;
			
		}//end of SWITCH	
	}//end of $_FILES IF and IFELSE
	
	if(empty($profile_errors)){//if everything is OK

	//prepare to insert the data to the database
	$image_filename=mysqli_real_escape_string($dbc, $_SESSION['image']['file_name']);
	$tmp_name=mysqli_real_escape_string($dbc, $_SESSION['image']['tmp_name']);
	$image_size=(int)$_SESSION['image']['size'];
	$sql="INSERT INTO profiles (user_id,  last_name, first_name, avatar, species, interests, tmp_name, image_size, education, languages, date_created) VALUES ('$user_id','$last_name', '$first_name','$image_filename',  '$species', '$interests', '$tmp_name', '$image_size', '$education', '$languages', NOW())";
	//echo $sql;
	$result=mysqli_query($dbc, $sql);
	//if the query worked, rename the file:
	if(mysqli_affected_rows($dbc)==1){//it it returns and 1 row result
	$original='profile_uploads/'.$_SESSION['image']['tmp_name'].'_tmp';
	$destination='profile_uploads/'.$_SESSION['image']['tmp_name'];
	rename($original, $destination); // to make the upload permanent , the file will have to have the -tmp removed from its name.
	echo '<h4>The profile has been successfully added!</h4>';
	$_POST=array();
	$_FILES=array();
	unset($image_file, $_SESSION['image']); //the above three lines cleared so the form does not display any existing values
	//add a link to update the profile if user_id same as session id
	if($user_id==$_SESSION['user_id']){
		echo '<a href="profile_update.php">Edit Profile</a>';
	}
	include ('includes/footer.inc.php');
	exit();
		
	//end of sucessfully add profile	
	//-------------------------------------------------------------------------------------------------------------------	
	} else{// if database did not return any balue
	trigger_error('Your profile can not be added this time due to a system error. We apologize for any inconvenience.');
	//just incase there is an error (which shoudl not0, the file is deleted, so there is no file on the server without a corresponding database reference).
	unlink($destination);
	}
		
	}//end of mysqli_affected-row
	} else{
		   unset($_SESSION['image']);
	//end of the no error IF
	
					   
}//end of the $_SERVER REQUEST_MODE==POST IF

include ('includes/profile_form.inc.php');


}//end of query of profile database to find match

} else{
	echo "You can not access the page unless you are a member!";
}

//end of process the upload information

//include the form


?>




<?php
// Include the HTML footer file:
include ('includes/footer.inc.php');
?>
