<?php
    session_start();

if (isset($_POST['comment']))
{
    require('connect_to_db.php');
    
    $comment = nl2br(htmlspecialchars($_POST['comment']));
    
    $insert_query = $valiant_db->prepare("INSERT INTO comment (content, parent, commented_by, creation_date) VALUES (:comment, :parent, :user, NOW())");
    $insert_query->execute(array(':comment' => $comment, ':parent' => $_POST['parent'], ':user' => $_POST['user']));
    
    //find out if anyone else has commented since the page has loaded
    $count_query = "SELECT count(*) as 'count' FROM comment WHERE parent = " . $_POST['parent'];
    $count_result = $valiant_db->query($count_query);
    $count_row = $count_result->fetch(PDO::FETCH_ASSOC);
    
    //get the difference
    $limit = $count_row['count'] - $_POST['count'];
    
    //returns all new comments
    $comment_query = "SELECT temp.content, u.firstname FROM (SELECT content, creation_date, commented_by FROM comment c WHERE parent = " . $_POST['parent'] . " ORDER BY creation_date DESC LIMIT " . $limit . ") temp JOIN user u ON u.id = temp.commented_by ORDER BY temp.creation_date ASC";
    $comment_result = $valiant_db->query($comment_query);
    
    //echo "<div class='comment-box'> counts: " . $comment_query . "</div>";
    
    while ($comment = $comment_result->fetch(PDO::FETCH_ASSOC))
    {
        echo "<div class='comment-box'>" . $comment['firstname'] . ': ' . $comment['content'] . "</div>";
    }
    
    //close the connection
    $valiant_db = null;
}
else
    echo "You need to use me the right way!";

?>