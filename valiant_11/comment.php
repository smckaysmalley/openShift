<?php
    session_start();

if (isset($_POST['comment']))
{
    require('connect_to_db.php');
    
    $comment = $_SESSION['firstname'] . ': ' . htmlspecialchars($_POST['comment']);
    
    $insert_query = $valiant_db->prepare("INSERT INTO comment (content, parent, commented_by, creation_date) VALUES (:comment, :parent, :user, NOW())");
    $insert_query->execute(array(':comment' => $comment, ':parent' => $_POST['parent'], ':user' => $_POST['user']));
    
    //find out if anyone else has commented since the page has loaded
    $count_query = "SELECT count(*) as 'count' FROM comment WHERE parent = " . $_POST['parent'];
    $count_result = $valiant_db->query($count_query);
    $count_row = $count_result->fetch(PDO::FETCH_ASSOC);
    
    //get the difference
    $limit = $count_row['count'] - $_POST['count'];
    
    //returns all new comments
    $comment_query = "SELECT temp.content FROM (SELECT content, creation_date FROM comment c WHERE parent = " . $_POST['parent'] . " ORDER BY creation_date DESC LIMIT " . $limit . ") temp ORDER BY temp.creation_date ASC";
    $comment_result = $valiant_db->query($comment_query);
    $comments = $comment_result->fetchAll(PDO::FETCH_ASSOC);
    
    var_dump($comments);
    
//    foreach($comments as $row)
//    {
//        echo "<div class='comment-box'>" . $row['content'] . "</div>";
//    }
    
    //close the connection
    $valiant_db = null;
}
else
    echo "You need to use me the right way!";

?>