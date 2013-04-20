<?php
// Include the HTML header:
include ('includes/header.php');
// Include the header file:

$page_title="Change Password";
$pass_errors = array();
//echo $_SESSION['user_id'];
require('./includes/form_functions.inc.php'); 

if($_SERVER['REQUEST_METHOD']=='POST'){
	// Check for the existing password:
	if(!empty($_POST['current'])){
		$current=mysqli_real_escape_string($dbc, $_POST['current']);
	}else{
		$pass_errors['current']='<span class="warning">Please enter your current password!</span>';
	}
    // Check for a password and match against the confirmed password:
    if(preg_match('/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,20}$/', $_POST['pass1'])){
	      if($_POST['pass1']==$_POST['pass2']){
		$p=mysqli_real_escape_string($dbc, $_POST['pass1']); 
		  } else{
		$pass_errors['pass2']='<span class="warning">Your password did not match the confirmed password!</span>';
		  }
	}else{
	$pass_errors['pass1']='<span class="warning">Please enter a valid password!</span>';
	}

     if(empty($pass_errors)){//if everything this OK
     $sql="SELECT user_id FROM users WHERE pass='".sha1($current)."' AND user_id={$_SESSION['user_id']}";
     $result=mysqli_query($dbc, $sql);
        if(mysqli_num_rows($result)== 1){//correct
		$sql2="UPDATE users SET pass='".sha1($p). "' WHERE user_id={$_SESSION['user_id']} LIMIT 1";
		$result2=mysqli_query($dbc, $sql2);
		//echo mysqli_num_rows($result2);
		//$rows2=mysqli_fetch_array($result2);
	     //echo $rows2[0];
		if($result2){//if ran OK
      		   	echo "Your password has changed!";
				include ('includes/footer.inc.php');
				exit();
		}else{//if it did not run OK
		//mysqli_error($dbc);
     trigger_error('Your password could not be changed due to a system error. We apologize for any inconvenience.');
		}
	 }else{
	 $pass_errors['current']='<span class="warning">Your current password is incorrect!</span>';
	 }//end of current password else
	 }
}//end of form submission conditional


// Omit the closing PHP tag to avoid 'headers already sent' errors!
?>
 <h2>Change Your Password</h2>
      <p>Use the form below to change the password</p>
      <form action="" method="post" accept-charset="utf-8">
        <p class="signup_para">
         <strong>Current Password: </strong></p>
        <p  class="signup_para">  <?php create_form_input('current', 'password', $pass_errors); ?>
        </p>
        <p  class="signup_para">
         <strong>New Password: </strong><br/>
          <span class="reg_note">Must be between 6 and 20 characters long, with at least one lowercase letter, one uppercase letter, and one number.</small></span></p>
          <p  class="signup_para"><?php create_form_input('pass1', 'password', $pass_errors); ?>
        </p>
        <p  class="signup_para">
        <strong>Confirm New Password</strong></p>
         <p  class="signup_para"> <?php create_form_input('pass2', 'password', $pass_errors); ?>
        </p>
        <p>&#160;</p>
        <input type="submit" name="submit_button" value="Change &rarr;" id="submit_button" class="formbutton" />
      </form>

<?php
// Include the HTML footer file:
include ('includes/footer.inc.php');
?>
