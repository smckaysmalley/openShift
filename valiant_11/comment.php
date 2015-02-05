<?php
    session_start();

if (isset($_POST))
{
    include( $_SERVER['DOCUMENT_ROOT'] . "/localsetup.php");
    $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
    $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
    $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');

    // Create connection
    $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, 'valiant_11');
    if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
    
    $insert_comment = "INSERT INTO comment (content, parent, creation_date) VALUES ('" . $_SESSION['firstname'] . ": " . $_POST['comment'] . "', " . $_POST['parent'] . ", NOW())";
    mysqli_query($conn, $insert_comment)
    or die(mysqli_error($conn));
    
    $conn->close();
    header("Location: /valiant_11");
}
else
    header("Location: /valiant_11");

?>