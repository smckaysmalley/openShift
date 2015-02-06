<?php
    session_start();

if (isset($_POST))
{
    require('connect_to_db.php');
    
    $comment = $_SESSION['firstname'] . ': ' . $_POST['comment'];
    
    $insert_query = $valiant_db->prepare("INSERT INTO comment (content, parent, creation_date) VALUES (:comment, :parent, NOW())");
    $insert_query->execute(array(':comment' => $comment, ':parent' => $_POST['parent']));
    
    //close the connection
    $valiant_db = null;
    header("Location: /valiant_11");
}
else
    header("Location: /valiant_11");

?>