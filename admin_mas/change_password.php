<?php 
session_start();
//this page changes user's password after logged in
include('../includes_mas/connection.inc2.php');
// Array for recording errors:
$pass_errors = array();
//echo $_SESSION['user_id'];

if($_SERVER['REQUEST_METHOD']=='POST'){
	// Check for the existing password:
	if(!empty($_POST['current'])){
		$current=mysqli_real_escape_string($dbc, $_POST['current']);
	}else{
		$pass_errors['current']='Please enter your current password!';
	}
    // Check for a password and match against the confirmed password:
    if(preg_match('/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,20}$/', $_POST['pass1'])){
	      if($_POST['pass1']==$_POST['pass2']){
		$p=mysqli_real_escape_string($dbc, $_POST['pass1']); 
		  } else{
		$pass_errors['pass2']='Your password did not match the confirmed password!';
		  }
	}else{
	$pass_errors['pass1']='Please enter a valid password!';
	}

     if(empty($pass_errors)){//if everything this OK
     $sql="SELECT id FROM users WHERE pass='".get_password_hash($current)."' AND id={$_SESSION['user_id']}";
     $result=mysqli_query($dbc, $sql);
        if(mysqli_num_rows($result)== 1){//correct
		$sql2="UPDATE users SET pass='".get_password_hash($p). "' WHERE id={$_SESSION['user_id']} LIMIT 1";
		$result2=mysqli_query($dbc, $sql2);
		//echo mysqli_num_rows($result2);
		//$rows2=mysqli_fetch_array($result2);
	     //echo $rows2[0];
		if($result2){//if ran OK
      		   	
		}else{//if it did not run OK
		//mysqli_error($dbc);
     trigger_error('Your password could not be changed due to a system error. We apologize for any inconvenience.');
		}
	 }else{
	 $pass_errors['current']="your current password is incorrect!";
	 }//end of current password else
	 }
}//end of form submission conditional


// Omit the closing PHP tag to avoid 'headers already sent' errors!
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Maggie Art Studio About</title>
<link href="../stylesheets_mas/css_reset.css" rel="stylesheet" type="text/css" />
<link href="../stylesheets_mas/global.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header_wrapper">
  <?php
include('../includes_mas/header.inc.php');
?>
</div>
<div id="content">
  <div id="leftnav"> 
 <?php include('../includes_mas/menu_user.inc.php'); ?>
  </div>
  <div id="main_content">
    <div id="main_content_inner">
      <?php require('../includes_mas/form_functions.inc.php'); 
?>
<?php 

		if($result2){//if ran OK
       echo $message='<h3>Your password has been changed.</h3>';
		}else{

?>
      <h2>Change Your Password</h2>
      <p>Use the form below to change the password</p>
      <form action="change_password.php" method="post" accept-charset="utf-8">
        <p>
          <label for="pass1"><strong>Current Password</strong></label>
          <?php create_form_input('current', 'password', $pass_errors); ?>
        </p>
        <p>
          <label for="pass1"><strong>New Password</strong></label>
          <small>Must be between 6 and 20 characters long, with at least one lowercase letter, one uppercase letter, and one number.</small>
          <?php create_form_input('pass1', 'password', $pass_errors); ?>
        </p>
        <p>
          <label for="pass2"><strong>Confirm New Password</strong></label>
          <?php create_form_input('pass2', 'password', $pass_errors); ?>
        </p>
        <input type="submit" name="submit_button" value="Change &rarr;" id="submit_button" class="formbutton" />
      </form>
      <?php
		}


	?>
    </div>
    <!--end of main nner-->
  </div>
  <!--end of main-->
</div>
<!--end of content-->
<div id="footer_wrapper">
  <?php
include('../includes_mas/footer.inc.php');
?>
</div>
</body>
</html>