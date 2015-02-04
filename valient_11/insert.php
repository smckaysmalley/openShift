<?php
session_start();

    include( $_SERVER['DOCUMENT_ROOT'] . "/localsetup.php");
    $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
    $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
    $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');

// Create connection
$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, 'valient_11');
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

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
	$content = $_POST["content"];

$sql = "INSERT INTO material (title, type, content, created_by, creation_date) VALUES(\"" . $_POST["title"] . "\", '" . $_POST["type"] . "', '" . $content . "', " . $_SESSION["user_id"] . ", NOW())";

mysqli_query($conn, $sql)
or die(mysqli_error($conn));

$conn->close();
$_SESSION["message"] = "Successfully added content";
header("Location: /valient_11");
?>