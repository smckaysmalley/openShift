<?php

require( $_SERVER['DOCUMENT_ROOT'] . "/environment_variables/local.php");
$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');

// Create connection
try {
    $faith_db = new PDO("mysql:host=$dbHost;dbname=faith", $dbUser, $dbPassword);
}
catch(Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    die();
}

?>