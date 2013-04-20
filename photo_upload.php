<?php 

// Include the HTML header:

include ('includes/header.php');
$photo_errors=array();

?>
<?php
//******************************************************************************************************************


//process the form if no file on the system found

if(isset($_SESSION['user_id'])){
	//display the upload form if is not submitted
//echo "User Session ID is: ".$_SESSION['user_id'];
echo "<h2>Upload your photos now!</h2><br/>";
	//echo "No profile on record, please fill in the form below:";
if(isset($_POST['submit_photo'])){
	echo "You have clicked the photo upload button";
	$user_id=$_SESSION['user_id'];
	echo "user id is: ".$user_id;
	//the following two vadilate the input fields, make sure it is 
	if(!empty($_POST['title'])){
		$title=mysqli_real_escape_string($dbc, strip_tags($_POST['title']));
		echo $title."<br/>";
	} else{
		$photo_errors['title']='Please enter a title!';
	}//end of check $_POST[first-name} input
						   
	if(!empty($_POST['description'])){
	$description=mysqli_real_escape_string($dbc, strip_tags($_POST['description']));
	//echo $last_name."<br/>";
	} else{
		$photo_errors['description']='Please enter your last name!';
	}//end of check $_POST[title} input
						   
    if(!empty($_POST['tags'])){
	$tags=mysqli_real_escape_string($dbc, strip_tags($_POST['tags']));
	//echo $species."<br/>";
	} else{
		$photo_errors['tags']='Please enter tags for easy searching!';
	}//end of check $_POST[tags} input
	
	
	

	//check to see if the input name 'image' is in the $_FILES array
	if(is_uploaded_file($_FILES['image']['tmp_name'])&&($_FILES['image']['error']==UPLOAD_ERR_OK)){
		//echo "The file name is: ".$_FILES['image'];
		$image_file=$_FILES['image'];			
		$image_size=ROUND($image_file['size']/1024);
		//check the size if it is too large
		if($image_size>1024){
			$photo_errors['image']='The uploaded file was too large.';		//image is the name of the input field to upload the image files
		}
		//check if is the right type
		$permitted_filetypes=array('image/jpeg', 'image/png', 'image/gif');
		if(!in_array($image_file['type'], $permitted_filetypes) && ((substr($image_file['name'], -4) !== 'jpeg' ) ||(substr($image_file['name'], -4) !== '.png' ) ||(substr($image_file['name'], -4) !== '.gif' ) )){
			$photo_errors['image']='The uploaded file was not a image type -- jpg, png or gif format';		
		}
		//if there is no error, create the file's new name and destination:
		if(!array_key_exists('image', $photo_errors)){
			$tmp_name=sha1($image_file['name'].uniqid('',true));
			$destination='photo_uploads/'.$tmp_name.'_tmp';
			//move the file  $image_file=$_FILES['image'] as defined previously
			if(move_uploaded_file($image_file['tmp_name'], $destination)){
			$_SESSION['image']['tmp_name']=$tmp_name; //$tmp_name is defined three lines above which is encrypted
			$_SESSION['image']['size']=$image_size;
			$_SESSION['image']['file_name']=$image_file['name'];
			echo '<h4>The file has been successfully uploaded!</h4>';	
			} else{
				trigger_error('Due to a system error, we can not upload your image now.');
				unlink($image_file['tmp_name']);	//remove the uploaded file so it does not cluttering up the temporary directory.		  
			}//end of move_uploaded_file	
		}//end of array-key-exist  IF
	}elseif (!isset($_SESSION['image'])){//no uploaded file
		switch($_FILES['image']['error']){
			case 1:
			case 2:
			$photo_errors['image']='The uploaded file was too large.';
			break;
			case 3:
			$photo_errors['image']='The file was only partially uploaded.';
			break;
			case 6:
			case 7:
			case 8:
			$photo_errors['image']='The file cound not be uploaded due to a system error.';
			break;
			case 4:
			default:
			$photo_errors['image']='No file was uploaded.';
			break;
			
		}//end of SWITCH	
	}//end of $_FILES IF and IFELSE
	
	if(empty($photo_errors)){//if everything is OK
	echo "No erros found!";
	//prepare to insert the data to the database
	$image_filename=mysqli_real_escape_string($dbc, $_SESSION['image']['file_name']);
	$tmp_name=mysqli_real_escape_string($dbc, $_SESSION['image']['tmp_name']);
	$image_size=(int)$_SESSION['image']['size'];
	$sql="INSERT INTO photo_uploads(user_id,   tmp_name, title, description,tags,  file_name, photo_size,  date_uploaded) VALUES ('$user_id','$tmp_name','$title', '$description','$tags',  '$image_filename',  '$image_size', NOW())";
	//echo $sql;
	$result=mysqli_query($dbc, $sql);
	//if the query worked, rename the file:
	if(mysqli_affected_rows($dbc)==1){//it it returns and 1 row result
	$original='photo_uploads/'.$_SESSION['image']['tmp_name'].'_tmp';
	$destination='photo_uploads/'.$_SESSION['image']['tmp_name'];
	rename($original, $destination); // to make the upload permanent , the file will have to have the -tmp removed from its name.
	echo '<h4>The profile has been successfully added!</h4>';
	$_POST=array();
	$_FILES=array();
	unset($image_file, $_SESSION['image']); //the above three lines cleared so the form does not display any existing values
	//add a link to update the profile if user_id same as session id
	if($user_id==$_SESSION['user_id']){
		echo '<a href="photo.php">View Photo Album</a>';
	}
		
		
	//end of sucessfully add profile	
	//-------------------------------------------------------------------------------------------------------------------	
	} else{// if database did not return any balue
	trigger_error('Your photo can not be added this time due to a system error. We apologize for any inconvenience.');
	//just incase there is an error (which shoudl not0, the file is deleted, so there is no file on the server without a corresponding database reference).
	unlink($destination);
	}
		
	}//end of mysqli_affected-row
	} else{
		   unset($_SESSION['image']);
	//end of the no error IF

					   
}//end of the $_SERVER REQUEST_MODE==POST IF

	include ('includes/photo_form.inc.php');


//}//end of query of profile database to find match

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
