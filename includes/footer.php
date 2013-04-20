<!-- Script 15.2 - footer.html -->
</div><!--end of main content inner-->
<div id="main_content_right">

<h2>LIfe is hard, have some donuts</h2>
<p>&#160;</p>
<img src="images_bl/donuts.jpg" />

</div><!--end of right-->
</div><!--end of main content-->

</div><!--end of content--> 
<div id="footer_wrapper">
  <div id="footer">
  <?php
  // For choosing a forum/language:
echo '</b><p><form action="forum.php" method="get">
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
<input name="submit" type="submit" value="' . $words['submit'] . '" />
</form></p>
';
  ?>
  
  
  &copy; 2011 Bottomlines.com We will never be free -- free to sell your privacy!</div>
  </div>
</body>
</html>
