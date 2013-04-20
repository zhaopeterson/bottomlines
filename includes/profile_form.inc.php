<div id="profile_content">
<h3> Basic Info:<br/></h3>
  <form action="" enctype="multipart/form-data" method="post" name="profile_basic" accept-charset="utf-8">
  <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
    <p class="profile_para"><span class="profile_label">First Name*:</span>
      <input name="first_name" id="first_name" type="text" size="40" />
      &#160; <?php echo '<span class="warning">'.$profile_errors['first_name'].'</span>';?> </p>
    <p class="profile_para"><span class="profile_label">Last Name*:</span>
      <input name="last_name" id="last_name" type="text" size="40" />
      &#160; <?php echo '<span class="warning">'.$profile_errors['last_name'].'</span>';?> </p>
   
   
    <p class="profile_para">
      <span class="profile_label">Species*:</span>
      <select name="species" id="species">
      <option>- Select One -</option>
        <option value="human" <?php if($_POST&& $_POST['species']=='Human'){
	echo "Selected";
} ?> >Human</option>
        <option value="borg" <?php if($_POST&& $_POST['species']=='borg'){
	echo "Selected";
} ?> >Borg</option>
      </select>
    </p>
    <p class="profile_para"><span class="profile_label">Avatar*:</span>
      <input name="image" id="image" type="file" size="30" />
      &#160; <?php echo '<span class="warning">'.$profile_errors['image'].'</span>';?><br/> 
      <small>Image type files (.jpg.png.gif) only, 1MB Limit</small></p>
      
      <?php
	  if (isset($_SESSION['image'])){
	echo "Currently '{$_SESSION['image']['file_name']}'";
}//end of issset$_SESSION['image']
//end of errors IF-ELSE
 else{
	echo "you need to loging to access this page";
}

	  ?>
    <p class="profile_para"><span class="profile_label">Interests:</span>
      <textarea name="interests" id="interests" cols="40" rows="2"></textarea>
       &#160; <?php echo '<span class="warning">'.$profile_errors['interests'].'</span>';?> </p>
    </p>
    <!--start more questions"-->
    <p class="profile_para"><span class="profile_label">Education:</span>
      <textarea name="education" id="education" cols="40" rows="2"></textarea>
       &#160; <?php echo '<span class="warning">'.$profile_errors['education'].'</span>';?> </p>
    </p>
     <p class="profile_para"><span class="profile_label">Languages:</span>
      <textarea name="languages" id="languages" cols="40" rows="2"></textarea>
       &#160; <?php echo '<span class="warning">'.$profile_errors['languages'].'</span>';?> </p>
    </p>
    <p><input type="submit" name="submit_profile" value="Save Change" id="submit_profile" /></p>
</fieldset>
  </form><!--end of the profile form-->
</div>
<!--end of profile contnet div-->