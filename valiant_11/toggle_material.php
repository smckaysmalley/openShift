<?php 

require('connect_to_db.php');

$display_query = $valiant_db->prepare("UPDATE material SET display = NOT display WHERE id = :id");
$display_query->execute(array(':id' => $_POST['id']));

$status_query = $valiant_db->prepare("SELECT display FROM material WHERE id = :id");
$status_query->execute(array(':id' => $_POST['id']));
$status_result = $status_query->fetch(PDO::FETCH_ASSOC);

echo $status_result['display'];

?>