<?php require( $_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>
<?php
if (isset($_SESSION['admin']) || isset($_SESSION['teacher']))
{
	if ($_SESSION["admin"] || $_SESSION["teacher"])
	{
	   require($_SERVER['DOCUMENT_ROOT'] . "/valiant_11/admin_panel.php");	
    }
}

$class_member = false;
if (isset($_SESSION['admin']))
{
    if ($_SESSION['admin'] == 1 || $_SESSION['teacher'] == 1 || $_SESSION['student'] == 1)
        $class_member = true;
}

require("connect_to_db.php");

$material_query = "SELECT id, title, content FROM material WHERE display = 1 ORDER BY creation_date DESC LIMIT 10";
$material_result = $valiant_db->query($material_query);

while ($material_row = $material_result->fetch(PDO::FETCH_ASSOC))
{
    $enjoy_query = "SELECT count(*) as 'count' FROM enjoy WHERE parent = " . $material_row['id'];
    $enjoy_result = $valiant_db->query($enjoy_query);
    $enjoy_count = $enjoy_result->fetch(PDO::FETCH_ASSOC);

    echo "
    <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
        <div class='panel panel-primary'>
            <div class='panel-heading'>
                <div class='panel-title panel-left'>
                " .	$material_row['title'] . "
                </div>
                <div class='panel-right'>
                    <span class='enjoy-count badge'>";
                
    if ($enjoy_count['count'] > 0)
        echo $enjoy_count['count'];

    echo "</span>
        <img class='";
    
    if (isset($_SESSION['user_id'])) {
        $enjoy_status_query = $enjoy_query . " AND enjoyed_by = " . $_SESSION['user_id'];
        $enjoy_status_result = $valiant_db->query($enjoy_status_query);
        $enjoy_status_count = $enjoy_status_result->fetch(PDO::FETCH_ASSOC);
    
        if($enjoy_status_count['count'])
            echo "enjoy";
        else
            echo "no-enjoy";
    }
        
    else
        echo "no-enjoy";
    
    echo "' src='/images/enjoy.png'"; 

    if ($class_member)
        echo "onclick='enjoy(this, " . $material_row['id'] . ", " . $_SESSION['user_id'] . ");'";

        echo "/>";
                    
    echo "</div>
        </div>
        <div class='panel-body center'>
        " .	$material_row['content'];

    //get comments and insert them, but only if user is a student, teacher, or admin!
    if ($class_member)
    {
        $comment_query = "SELECT content FROM comment WHERE parent = " . $material_row['id'];
        $comment_result = $valiant_db->query($comment_query);

        echo "<div class='comments'>";
        while ($comment_row = $comment_result->fetch(PDO::FETCH_ASSOC))
            echo "<div class='comment-box'>" . $comment_row['content'] . "</div>";
        echo "</div>";

        echo "
                <textarea class='comment' rows='2' name='comment' placeholder='Have a comment?'></textarea>
                <button class='btn btn-sm btn-default' onclick='comment(this, " . $material_row['id'] . ", " . $_SESSION['user_id'] . ");'>Comment</button>";
    }

    echo "</div></div></div>";
}

$valiant_db = null;

?>

<script type="text/javascript" src="/js/valiant_11.js"></script>

<?php require( $_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>