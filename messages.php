<?php # 
// This page shows the threads in a forum.
include ('includes/header.php');
 //*****************************************************************************************************************************
 //include the form on top of the body
 
 //process the postform
//this script has problem when you use the refresh button, which will submit the form twice.
include('post_form_onhp.php');
include('process_post.php');

//process end new post
//********************************************************************************************************************************
// Retrieve all the messages in this forum...
//before fetch thread, fetch friends list first, as you can only see the post by your friends
 //query the freinds table see if there are any friends on the list
 
		//echo $user_id;
		$q_uf="SELECT user_id, userfriend_id FROM friends WHERE user_id='$user_id'";
		//echo $q_uf;
		$r_uf=mysqli_query($dbc, $q_uf);
		//echo $r_uf;
		if(mysqli_num_rows($r_uf)>0){
			//echo "You have friends!";
			$friends=array();
			while($row=mysqli_fetch_assoc($r_uf)){
			$friends[]="'".$row['userfriend_id']."'";
			}
			//echo var_dump($friends); suceessfully retrieve the freinds user id
			$friends_list=implode(',',$friends);
		    $friends_list=implode(',',$friends).",'$user_id'";
			
		} else{//if no friends found only display the list of self
			$friends=array();
			$friends[]="";
			$friends_list="'$user_id'";
		}
		
		
// If the user is logged in and has chosen a time zone,
// use that to convert the dates and times:
if (isset($_SESSION['user_tz'])) {
	$first = "CONVERT_TZ(p.posted_on, 'UTC', '{$_SESSION['user_tz']}')";
	$last = "CONVERT_TZ(p.posted_on, 'UTC', '{$_SESSION['user_tz']}')";
} else {
	$first = 'p.posted_on';
	$last = 'p.posted_on';
}
//$qtime="SELECT MAX(posted_on) FROM posts WHERE thread_id=5";


//this query only works if there is at least post from self or freinds
// The query for retrieving all the threads in this forum, along with the original user,
// when the thread was first posted, when it was last replied to, and how many replies it's had:
$q = "SELECT t.user_id AS author_id,t.thread_id, t.subject, username, COUNT(post_id) - 1 AS responses, SUM(spare_count) AS spareno, MAX($last) AS last, MIN($first) AS first, message, avatar FROM threads AS t INNER JOIN posts AS p USING (thread_id) LEFT JOIN users AS u ON  t.user_id = u.user_id  LEFT JOIN profiles AS pf ON t.user_id=pf.user_id WHERE t.lang_id = {$_SESSION['lid']} AND t.user_id IN ($friends_list) GROUP BY (p.thread_id) ORDER BY last DESC";
//echo $q;
//echo $row['thread_id'];
$r = mysqli_query($dbc, $q);

if (mysqli_num_rows($r) > 0) {
//echo "return number of threads: ".mysqli_num_rows($r);
	// Create a table:
	//----------------------------------------------------------------------------------------------------------------
	//this is to show a customer header
if (!isset($_GET['user_id']) || $_GET['user_id']==$_SESSION['user_id']){
		//echo "<h4>Welcome to your customized anti-social page! ".$_SESSION['username']." Please feel safe, no one will sell your privacy unless you pay big bucks!!</h4><br/>";
		}
 else if(isset($_GET['user_id'])){
	// echo "Session id : ".$_SESSION['user_id'];
			//$_SESSION['user_id']=$author_id;
			//$user_id=$_SESSION['user_id']
			$q2="SELECT user_id, username FROM users WHERE user_id='".$_GET['user_id']."'";
			$r2=mysqli_query($dbc, $q2);
			$row2=mysqli_fetch_array($r2);
			//echo "<h2>Now you are onto: username: ".$row2['username']." customized page</h2><br/>";
 }

 //end of customer header
 //-------------------------------------------------------------------------------------------------------------------
 
//process the spare counter

	// Fetch each thread:
	//declar arrys to store the data
	$views=array();
	$tids=array();
	$count=1;


	while ($row=mysqli_fetch_assoc($r) ) {
		$author_id=$row['author_id'];
		//process the spare button
		echo '<div class="message_style">';
		
	//---------------------------------------------------------------------------------------------
	
	
	//-------------------------------------------------------------------------------------------

		
	    if (!$row['avatar']){
			echo '<p><a href="messages.php?user_id='.$author_id.'" ><img src="images_profiles/noimage.jpg" class="avatar_small" width="40" height="40" /></a>';
		}else{
		echo '<p><a href="messages.php?user_id='.$author_id.'" ><img src="images_profiles/'.$row['avatar'].'" class="avatar_small" width="40" height="40" /></a> ';
		}
		
		$views[$count]="view".$row['thread_id'];
		$tids[$count]=$row['thread_id'];
		
		//echo "Thread id original is:".$row['thread_id']." ";
		//echo "Subject: ";
		echo '<a href="read.php?tid=' . $row['thread_id'] . '">' . $row['subject'] . '</a><span class="spare_count_form"> &#160;By: </span><a href="messages.php?user_id='.$author_id.'" >'. $row['username'] . '</a></p>
		
		<p class="post_time">
        Posted on: ' . $row['first'] . ' &#160</p>';
	
		echo '<form action="" method="post" class="spare_count_form" >
		<input type="submit" name="spare_count'.$count.'" id="spare_count" value=""/> '. $row['spareno'].' people spare it ';
		//-------------------------------------------------------------------------------------------------------------------------------------
		//script to process the spare button
	$spare_buttonNo="spare_count".$count;
if(isset($_POST[$spare_buttonNo])){
	
	//echo "Thread id is: ".$row['thread_id'];
	//echo "first post on is".$row['first'];
	$scthread_id=$row['thread_id'];
	$fpost=$row['first'];
	//get the thread id and post id of the original post
	$sql_op="SELECT thread_id, post_id, spare_count, MIN($first) AS first FROM posts AS p  WHERE thread_id='$scthread_id' AND posted_on='$fpost' ";
	//echo $sql_op;
	$result_op=mysqli_query($dbc, $sql_op);
	$row_pid=mysqli_fetch_array($result_op);
	if(mysqli_num_rows($result_op)>0){
		//$spare_count=$row['spare_count'];
		$post_id=$row_pid['post_id'];
		//echo "<p>Post_id is: ".$row_pid['post_id']."</p>";
	$sql_addsc="UPDATE posts SET spare_count=spare_count+1 WHERE thread_id='$scthread_id' AND post_id='$post_id'";
	//echo $sql_addsc;
    $result_addsc=mysqli_query($dbc, $sql_addsc);
	echo " You spare it!";
	}

}//end of isset spare button
		//--------------------------------------------------------------------------------------------------------------------------------------
		echo '</form>';
	
		echo '<p>'.$row['message'].'</p>';
	   echo '<form method="post" action=""> 
	<p class="post_time" > There are: ' . $row['responses'] . ' replies. Last reply: ' . $row['last'].'      '.
		'<input type="submit" name="view_button" class="view_buttonstyle" value="view_button'.$row['thread_id'].'" id="view_button'.$row['thread_id']. '" />'
		.'<input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv'.$row['thread_id'].'" id="hidden'.$row['thread_id']. '" />'.
		'</p>';

		 echo '</form>';
        //store the information in the arrays
		$ids[$count]="replydiv".$row['thread_id'];
		//echo $id;
		$tid=$row['thread_id'];

		echo "<div class='replies_body' id='replydiv".$row['thread_id']."' >";

		include('read_reply_inline.php');

		echo "</div>"; //end of replies body div
		echo "</div>";//this is the div for message style;
		$count++;
	}//end of while rows
	$totalcount=mysqli_num_rows($r);
	//start processing if a button is clicked, then set the display to block
   
		include('process_reply.php');
    if (isset($_POST['view_button'])){
		 

	?>
<script type="text/javascript">;
   function processview() {
	//alert ("I am clicked");
    document.getElementById("<?php echo $_POST['div_id'] ?>").style.display="block";
   }
   document.getElementById("<?php echo $_POST['view_button'] ?>").onclick=processview();
   
   </script>
<?php
		}//end of process a view button

} else {
	echo '<p>There are currently no messages on your bulletin.</p>';
}

// Include the HTML footer file:
include ('includes/footer.inc.php');
?>
