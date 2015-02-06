<?php

if (isset($_POST))
{
    require('connect_to_db.php');
    
    $check_query = "SELECT count(*) as 'enjoys' FROM enjoy WHERE enjoyed_by = " . $_POST['user'] . " AND parent = " . $_POST['parent'];
    $check_result = $valiant_db->query($check_query);
    $check_row = $check_result->fetch(PDO::FETCH_ASSOC);
    
    if ($check_row['enjoys'] == 0) {
        $enjoy_query = $valiant_db->prepare("INSERT INTO enjoy (parent, enjoyed_by, creation_date) VALUES (:parent, :user, NOW())");
        $enjoy_query->execute(array(':parent' => $_POST['parent'], ':user' => $_POST['user']));
    }
    
    $count_query = "SELECT count(*) as 'enjoys' FROM enjoy WHERE parent = " . $_POST['parent'];
    $count_result = $valiant_db->query($count_query);
    $count_row = $count_result->fetch(PDO::FETCH_ASSOC);

    echo $count_row['enjoys'];
    
    //close the database
    $valiant_db = null;
}
?>