<?php 
// This page displays an image.
session_start();
$name = FALSE; // Flag variable:
require_once('./includes/mysqli_connect.php');
// Check for an image name in the URL:
if (isset($_SESSION['user_id'])&&isset($_GET['photo_id'])) {
	$photo_id=$_GET['photo_id'];
	$user_id=$_SESSION['user_id'];
	echo "SESSION id is: ".$_SESSION['user_id']."<br/>";
	echo "photo id is: ".$photo_id."<br/>";
	//echo "<img src='stockphotos/meal_turkey.jpg' />";
	$sql_pl="SELECT photo_id, user_id, tmp_name, title, description  FROM photo_uploads WHERE photo_id='$photo_id' ";
	echo $sql;
	$result_pl=mysqli_query($dbc, $sql_pl);
	$row=mysqli_fetch_array($result_pl);
	if(mysqli_num_rows($result_pl)==1){
		echo $row['tmp_name'];
		echo $row['title'];
		echo "<img src='photo_uploads/".$row['tmp_name']."' />";
		//echo "hello from inside!";
	}else{
		echo "Sorry due to a system error we can not access that image";
	}

} else{
	echo "You can not access the page without login";
}
		
?>

