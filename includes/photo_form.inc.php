<div id="uploadphoto_content">
<p id="add_phototitle"> Add Photo Here:<br/></h3>
  <form action="" enctype="multipart/form-data" method="post" name="photo_upload" accept-charset="utf-8">
  <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
    <p class="profile_para"><span class="profile_label">Title*:</span>
      <input name="title" id="title" type="text" size="40" />
       &#160; <?php echo '<span class="warning">'.$photo_errors['title'].'</span>';?> </p>
       
       <p class="profile_para"><span class="profile_label">Description*:</span>
      <input name="description" id="description" type="text" size="40" />
      &#160; <?php echo '<span class="warning">'.$photo_errors['first_name'].'</span>';?> </p>
      
    <p class="profile_para"><span class="profile_label">Tags*:</span>
      <input name="tags" id="tags" type="text" size="40" />
      &#160; <?php echo '<span class="warning">'.$photo_errors['tags'].'</span>';?> </p>
   
  
    <p class="profile_para"><span class="profile_label">Add Photo*:</span>
      <input name="image" id="image" type="file" size="30" />
      &#160; <?php echo '<span class="warning">'.$photo_errors['image'].'</span>';?><br/> 
      <small>Image type files (.jpg.png.gif) only, 1MB Limit</small></p>
      
      <?php
	  if (isset($_SESSION['image'])){
	echo "Currently '{$_SESSION['image']['file_name']}'";
}//end of issset$_SESSION['image']
//end of errors IF-ELSE
 else{
	//echo "you need to log in to access this page";
}

	  ?>
   
    <p><input type="submit" name="submit_photo" value="Add Photo" id="submit_profile" /></p>
</fieldset>
  </form><!--end of the profile form-->
</div>
<!--end of profile contnet div-->