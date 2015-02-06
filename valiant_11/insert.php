<?php
session_start();
require('connect_to_db.php');

if ($_POST["type"] == "youtube")
{
	$start = strpos($_POST["content"], "?v=");
	$id = substr($_POST["content"], $start+3, 11);
	$content ="<div class=\"embed-responsive embed-responsive-16by9\"><iframe class=\"embed-responsive-item\" src=\"//www.youtube-nocookie.com/embed/" . $id . "?rel=0&amp;showinfo=0\" allowfullscreen></iframe></div>";
}
else if ($_POST["type"] == "picture")
{
	$content ="<img src=\"" . $_POST["content"] . "\" width=\"100%\" title=\"" . $_POST["title"] . "\" alt=\"" . $_POST["title"] . "\">";
}
else if ($_POST["type"] == "text")
	$content = "<p class='content'>" .$_POST["content"] . "</p>";

$material_query = $valiant_db->prepare("INSERT INTO material (title, type, content, created_by, creation_date) VALUES(:title, :type, :content, :user_id, NOW())");
$material_query->execute(array(':title' => $_POST['title'], ':type' => $_POST['type'], ':content' => $content, ':user_id' => $_SESSION['user_id']));

//close the database
$valiant_db = null;
$_SESSION["message"] = "Successfully added content";
header("Location: /valiant_11");
?>