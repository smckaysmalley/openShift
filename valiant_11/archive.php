<?php require( $_SERVER['DOCUMENT_ROOT'] . '/header.php'); 
if (!isset($_SESSION['admin'])) {
    header("Location: /valiant_11");
}
else if (!$_SESSION["admin"] && !$_SESSION["teacher"]) {
    header("Location: /valiant_11");
}
?>

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/valiant_11/admin_panel.php");
require("connect_to_db.php");

$material_query = "SELECT id, title, content, display FROM material ORDER BY creation_date DESC";
$material_result = $valiant_db->query($material_query);

echo "<section>";
while ($material_row = $material_result->fetch(PDO::FETCH_ASSOC))
{
    echo "
    <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
        <div class='panel panel-primary";
        if (!$material_row['display'])
            echo " archived";
        echo "'>
            <div class='panel-heading'>
                <div class='panel-title panel-left'>
                    " .	$material_row['title'] . "
                </div>
                <div class='panel-right'>
                    <span onclick='archive(this, " . $material_row['id'] . ");' class='label label-";
    
                    if ($material_row['display'])
                        echo "success'>Active";
                    else
                        echo "danger'>Archived";
                
                echo "</span>
                </div>
            </div>
        <div class='panel-body center'>
        " .	$material_row['content'] . "
        </div>
    </div></div>";
}
echo "</section>";

$valiant_db = null;

?>

<script type="text/javascript" src="/js/valiant_11.js"></script>

<?php require( $_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>