<?php


// Create an empty error array if it doesn't already exist:
if (!isset($reg_errors)) $reg_errors = array();

// Need the form functions script, which defines create_form_input():
// The file may already have been included (e.g., if this is register.php or forgot_password.php).
//require_once ('includes_mas/form_functions.inc.php');
?>
<form action="" method="post" accept-charset="utf-8" >

		<!--<p class="reg_form"><label for="first_name"><strong>First Name: &#160; &#160; </strong></label><?php create_form_input('first_name', 'text', $reg_errors); ?></p>
		
		<p class="reg_form"><label for="last_name"><strong>Last Name: &#160; &#160; </strong></label><?php create_form_input('last_name', 'text', $reg_errors); ?></p>-->
		
		<p class="reg_form"><label for="username"><strong>Username: &#160; &#160; </strong></label><?php create_form_input('username', 'text', $reg_errors); ?></p> <span class="reg_note"> (Only letters and numbers are allowed.)</span>
		
		<p class="reg_form"><label for="email"><strong>Email Address: &#160; &#160; </strong></label><?php create_form_input('email', 'text', $reg_errors); ?></p>
		
		<p class="reg_form"><label for="pass1"><strong>Password: &#160; &#160; </strong></label><?php create_form_input('pass1', 'password', $reg_errors); ?> </p><span class="reg_note"> (Must be between 6 and 20 characters long, with at least one lowercase letter, one uppercase letter, and one number.)</span>
		<p class="reg_form"><label for="pass2"><strong>Confirm  &#160; &#160; Password: &#160; &#160; </strong></label> <?php create_form_input('pass2', 'password', $reg_errors); ?></p>
  <p>&#160;</p>      
<p><label for="timezone"><strong>Timezone: </strong></label><select name="timezone_id" id="timezone_id">
  <?php
 //get the list of genres
 $getTimezone='SELECT timezone_id, timezone_name FROM timezones ORDER BY timezone_name';
 $timezons=mysqli_query($dbc, $getTimezone);
 while($row=mysqli_fetch_assoc($timezons)){
	 ?>
     <option value="America/Los_Angeles">America/Los_Angeles</option>
        <option value="<?php echo $row['timezone_id']; ?>"
     <?php
	 if ($row['timezone_id']==$timezone_id){
		 echo 'selected';
	 }
 ?>><?php echo $row['timezone_name']; ?></option>
        <?php } ?>
 
 </select>    </p>  
 <p>&#160;</p>  
  <p><label for="language"><strong>Language: </strong></label><select name="lang_id" id="lang_id">
  <?php
 //get the list of genres
 $getLanguage='SELECT lang_id, lang_eng FROM languages ORDER BY lang_id';
 $languages=mysqli_query($dbc,$getLanguage);
 while($row=mysqli_fetch_assoc($languages)){
	 ?>
        <option value="<?php echo $row['lang_id']; ?>"
     <?php
	 if ($row['lang_id']==$lang_id){
		 echo 'selected';
	 }
 ?>><?php echo $row['lang_eng']; ?></option>
        <?php } ?>
 
 </select></p>       
        
        
<p>&#160;</p>
<p align="center"><input type="submit" name="submit_signup" value="Sign Up" id="submit_button" class="formbutton" />
</p>
</form>

