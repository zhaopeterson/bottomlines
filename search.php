<?php
// This page displays and handles a search form.

// Include the HTML header:
include ('includes/header.php');

echo $_GET['terms'];

if (isset($_GET['terms'])) { // Handle the form.

	// Clean the terms:
	$terms = mysqli_real_escape_string($dbc, htmlentities(strip_tags($_GET['terms'])));

	// Run the query...
	$q = "SELECT * FROM threads WHERE subject LIKE '%$terms%'";
	echo $q;
	$r = mysqli_query($dbc, $q);

	if (mysqli_num_rows($r) > 0) {
		echo '<h2>Search Results</h2>';
		while($row = $r->fetch_assoc()){//echo $row['subject'];
		echo '<p> <a href="read.php?tid='.$row['thread_id'],'">'.$row['subject'].'</a></p>';
		}
	} else {
		echo '<p>No results found.</p>';
	}

}

// Include the HTML footer file:
include ('includes/footer.inc.php');
?>
