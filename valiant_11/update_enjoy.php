<?php

session_start();

require('connect_to_db.php');

$new_query = "SELECT DISTINCT parent FROM enjoy WHERE creation_date > TIMESTAMP(NOW()-INTERVAL 5 SECOND)";
$new_result = $valiant_db->query($new_query);

$row_count = $new_result->rowCount();

if ($row_count > 0)
{
    $enjoy_array = array();
    
    while ($new_enjoys = $new_result->fetch(PDO::FETCH_ASSOC))
    {
        $update_query = "SELECT count(*) as 'count' FROM enjoy WHERE parent = " . $new_enjoys['parent'];
        $update_result = $valiant_db->query($update_query);
        $enjoy_row = $update_result->fetch(PDO::FETCH_ASSOC);
        array_push($enjoy_array, array('parent' => $new_enjoys['parent'], 'enjoys' => $enjoy_row['count']));
    }
    
    echo json_encode($enjoy_array);
}

?>