<?php 

if (isset($_POST))
{
    require("connect_to_db.php");

    $scripture_insert = $faith_db->prepare("INSERT INTO scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)");
    $scripture_insert->execute(array(':book' => $_POST['book'], ':chapter' => $_POST['chapter'], ':verse' => $_POST['verse'], ':content' => $_POST['content']));
    
    $scripture_query = "SELECT id FROM scriptures WHERE content = '" . $_POST['content'] . "' AND chapter = " .$_POST['chapter'];
    $scripture_result = $faith_db->query($scripture_query);
    $scripture_id = $scripture_result->fetch(PDO::FETCH_ASSOC)['id'];
    
    foreach ($_POST['topic'] as $topic)
    {
        $topic_query = "SELECT id FROM topics WHERE name = '" . $topic . "'";
        $topic_result = $faith_db->query($topic_query);
        $topic_id = $topic_result->fetch(PDO::FETCH_ASSOC)['id'];
        
        $topic_insert = "INSERT INTO scripture_topic (scripture_id, topic_id) VALUES ($scripture_id, $topic_id)";
        $faith_db->query($topic_insert);
    }

    $faith_db = null;
    echo true;
}
else
    echo false;

?>