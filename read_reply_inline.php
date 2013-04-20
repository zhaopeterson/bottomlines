<?php

			
		if (isset($_SESSION['user_tz'])) {
		$posted = "CONVERT_TZ(p.posted_on, 'UTC', '{$_SESSION['user_tz']}')";
		} else {
		$posted = 'p.posted_on';
		}
		
		//counting how many posts in the thread
		$qi="SELECT thread_id, post_id FROM posts WHERE posts.thread_id=$tid";
		$ri=mysqli_query($dbc, $qi);
		$num_post=mysqli_num_rows($ri);
		//echo "total posts are: ".$num_post;
		
		$q2 = "SELECT t.subject , p.message, username, avatar, $posted AS posted FROM threads AS t LEFT JOIN posts AS p USING (thread_id) INNER JOIN users AS u ON p.user_id = u.user_id LEFT JOIN profiles AS pf  ON pf.user_id = u.user_id WHERE t.thread_id = $tid  ORDER  BY posted ASC  LIMIT 1, $num_post";
          //echo $q2;
                $r2 = mysqli_query($dbc, $q2);
				//echo "Mysqli num rows is: ".mysqli_num_rows($r2);
           if ((mysqli_num_rows($r2) > 0)) {

	              while ($messages = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {

		   
echo "<p class='reply_message'><a href='messages.php?user_id=".$author_id."' ><img src='images_profiles/".$messages['avatar']."'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>".$messages['username']." </span><span class='post_time' >". $messages['posted']."</span><br />".$messages['message']."</p>";
		 
	
	              } // End of WHILE loop.
		          
	                   // Show the form to post a reply:
					   echo "<div class='reply_message'>";
                 include ('post_form_replybox.php');
				 echo "</div>";//end of post_form div;
                      } else {
						  // Show the form to post a message:
				echo "<p class='first_reply'>Currently there is no replies, be the first one to reply!</p>";
				echo "<div class='reply_message'>";
                 include ('post_form_replybox.php');
				 echo "</div>";//end of post_form div;
						  
					  }

	
?>