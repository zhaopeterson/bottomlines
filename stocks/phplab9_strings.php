<?php
//problem A

$_POST['comment']="I <b> love </b> sweet <div class='fancy'>rice<div> & tea";
echo $_POST['comment'];
echo "<br/>";
$comment1=strip_tags($_POST['comment']);
echo $comment1;
echo "<br/>";
//name
$_POST['name']="My 'name' is <b>John</b>";
echo $_POST['name'];
echo "<br/>";
$name1=htmlspecialchars($_POST['name']);
echo $name1;
echo "<br/>";
$name2=htmlentities($_POST['name']);
echo $name2;
echo "<br/>";

?>