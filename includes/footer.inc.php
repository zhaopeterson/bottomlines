<!-- Script 15.2 - footer.html -->
</div><!--end of main content inner-->

<?php
$error=array();
if(isset($_POST['request'])){
$user_id=mysqli_real_escape_string($dbc,$_SESSION['user_id']);
//echo "The session id is:".$user_id;
//check to see if the ally id is selected
  if(!empty($_POST['ally_id'])){
  $ally_id=$_POST['ally_id']; 
  //echo "The ally you selected to add is: ".$ally_id;
  $q_a="SELECT user_id, userfriend_id FROM friends WHERE user_id=$user_id";
  $r_a=mysqli_query($dbc, $q_a);
  if(mysqli_num_rows($r_a)>0){
	  while($row=mysqli_fetch_array($r_a)){
		if ($ally_id==$row['userfriend_id']	){
			$error['ally_id']="This ally is already your ally!!";
		}
	  }
	  
  }
  
  
  
  }else{
	 $error['user_id']="You need to select an ally"; 
  }
  
  //if no error found prepare to inert the ally into friends table
  if(empty($error)){
  // initialize prepared statement to insert to the books table
  $stmt = $dbc->stmt_init();
  // create SQL
  $sql = 'INSERT INTO friends (user_id, userfriend_id, request_time)
		  VALUES(?, ?, NOW())';
  if ($stmt->prepare($sql)) {
	// bind parameters and execute statement
	$stmt->bind_param('ii', $user_id, $ally_id);
    // execute and get number of affected rows
	$stmt->execute();
	if ($stmt->affected_rows > 0) {
	 echo "<p class='warning'>you have add this ally!</p>";
	}
  }
  if ($stmt->prepare($sql)) {
	// bind parameters and execute statement
	$stmt->bind_param('ii', $ally_id, $user_id);
    // execute and get number of affected rows
	$stmt->execute();
	if ($stmt->affected_rows > 0) {
	//echo "you have add this ally!";
	}
  }
}
			//end of if empty error
  
}//end of isset request
  
  
  //starting remove process
  $remove_error=array();
if(isset($_POST['remove'])){
$user_id=mysqli_real_escape_string($dbc,$_SESSION['user_id']);
//echo "The session id is:".$user_id;
//check to see if the ally id is selected
  if(!empty($_POST['ally_id'])){
  $ally_id=$_POST['ally_id']; 
  //echo "The ally you selected to remove is: ".$ally_id;
  $q_a="SELECT user_id, userfriend_id FROM friends WHERE userfriend_id=$ally_id";
  $r_a=mysqli_query($dbc, $q_a);
  if(mysqli_num_rows($r_a)==0){
	  //echo "prepare to remove";
	 
			$remove_error['ally_id']="It not on your list, you can not remove!!";

	
	  
  }//end of mysqli_num_rows
  
  
  
  }else{
	 $remove_error['user_id']="You need to select an ally"; 
  }
  
  //if no error found prepare to inert the ally into friends table
  

  
  if(empty($remove_error)){
  // initialize prepared statement to insert to the books table
  $stmt = $dbc->stmt_init();
  // create SQL
  $sql = 'DELETE FROM friends WHERE user_id=? AND userfriend_id=?';
  if ($stmt->prepare($sql)) {
	// bind parameters and execute statement
	$stmt->bind_param('ii', $user_id, $ally_id);
    // execute and get number of affected rows
	$stmt->execute();
	if ($stmt->affected_rows > 0) {
	 echo "<p class='warning'>you have removed this ally!</p>";
	}else {
      $remove_error['delete'] = 'There was a problem remove this ally. '; 
	}
  }
  if ($stmt->prepare($sql)) {
	// bind parameters and execute statement
	$stmt->bind_param('ii', $ally_id, $user_id);
    // execute and get number of affected rows
	$stmt->execute();
	if ($stmt->affected_rows > 0) {
	 //echo "you have removed this all!";
	}
  }
}
			//end of if empty error
  
}//end of isset remove
?>
<div id="main_content_right">
<?php 
if(isset($_POST['request'])){
echo '<span class="warning">'.$error['user_id'].'</span><br/>';
echo '<span class="warning">'.$error['ally_id'].'</span><br/>';

				}
if(isset($_POST['remove'])){

echo '<span class="warning">'.$remove_error['user_id'].'</span><br/>';
echo '<span class="warning">'.$remove_error['ally_id'].'</span><br/>';
echo '<span class="warning">'.$remove_error['delete'].'</span><br/>';
				}
?>
<!--add friends list-->
  <form action="" method="post" name="find_allies">
    <p ><span class="label_style">Allies*:</span>
      <select name="ally_id" id="user_id">
        <option value="">Select a Ally</option>
        <?php
 //get the list of genres
 $q='SELECT user_id, username FROM users ORDER BY username';
 $r=mysqli_query($dbc, $q);
 while($row=mysqli_fetch_assoc($r)){
	 ?>
        <option value="<?php echo $row['user_id']; ?>"
     <?php
	 if ($row['user_id']==$ally_id){
		 echo 'selected';
	 }
 ?>><?php echo $row['username']; ?></option>
        <?php } ?>
       
      </select>
      </p>
      <p class="reg_form" align="center"><input type="submit" name="request" value="Request" id="request_button" class="formbutton" onclick="processview()" />&#160; &#160; &#160; <input type="submit" name="remove" value="Remove" id="remove_button" class="formbutton" />
</p>
      </form>
<h2>Life is hard, have some donuts</h2>
<p>&#160;</p>
<img src="images_bl/donuts.jpg" />

</div><!--end of right-->
</div><!--end of main content-->

</div><!--end of content--> 
<div id="footer_wrapper">
  <div id="footer">
  <?php
  // For choosing a forum/language:
echo '</b><form action="forum.php" method="get">
<select name="lid">
<option value="0">' . $words['language'] . '</option>
';

// Retrieve all the languages...
$q = "SELECT lang_id, lang FROM languages ORDER BY lang_eng ASC";
$r = mysqli_query($dbc, $q);
if (mysqli_num_rows($r) > 0) {
	while ($menu_row = mysqli_fetch_array($r, MYSQLI_NUM)) {
		echo "<option value=\"$menu_row[0]\">$menu_row[1]</option>\n";
	}
}
mysqli_free_result($r);
unset($menu_row);

echo '</select><br />
<input name="submit" type="submit" disabled="disabled" value="' . $words['submit'] . '" />
</form>
';
  ?>
  
  
  &copy; 2011 Bottomlines.com We will never be free -- free to sell your privacy!</div>
  </div><!--end of footer-->

</body>
</html>
