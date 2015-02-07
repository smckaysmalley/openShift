<?php
    session_start();

if (isset($_POST))
{
    require('connect_to_db.php');
    
    $comment = $_SESSION['firstname'] . ': ' . $_POST['comment'];
    
    $insert_query = $valiant_db->prepare("INSERT INTO comment (content, parent, commented_by, creation_date) VALUES (:comment, :parent, :user, NOW())");
    $insert_query->execute(array(':comment' => $comment, ':parent' => $_POST['parent'], ':user' => $_POST['user']));
    
    $comment_query = "SELECT content from comment WHERE parent = " . $_POST['parent'];
    $comment_result = $valiant_db->query($comment_query);

    while ($comment_row = $comment_result->fetch(PDO::FETCH_ASSOC))
        echo "<div class='comment-box'>" . $comment_row['content'] . "</div>";
    
    //close the connection
    $valiant_db = null;
}

?>