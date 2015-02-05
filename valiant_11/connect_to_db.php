<?php

include( $_SERVER['DOCUMENT_ROOT'] . "/localsetup.php");
$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');

// Create connection
$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, 'valiant_11');
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

?>