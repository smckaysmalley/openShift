<?php

session_start();

require('connect_to_db.php');

$new_query = "SELECT temp.parent, u.firstname, temp.content  FROM (SELECT content, parent, commented_by, creation_date FROM comment c WHERE creation_date > TIMESTAMP(NOW()-INTERVAL 2 SECOND) AND commented_by != " . $_SESSION['user_id'] . ") temp JOIN user u ON temp.commented_by = u.id ORDER BY temp.creation_date";
$new_result = $valiant_db->query($new_query);

$row_count = $new_result->rowCount();

if ($row_count > 0)
{
    $new_comments = $new_result->fetchAll(PDO::FETCH_ASSOC);
    
    for ($i = 0; $i < count($new_comments); $i++)
    {
        $new_comments[$i]['content'] = "<div class='comment-box'>" . $new_comments[$i]['firstname'] . ": " . $new_comments[$i]['content'] . "</div>";
        unset($new_comments[$i]['firstname']);
    }
    
    echo json_encode($new_comments);
}

?>