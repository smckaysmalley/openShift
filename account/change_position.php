<?php
session_start();

if (isset($_POST))
{
    require($_SERVER['DOCUMENT_ROOT'] . "/valiant_11/connect_to_db.php");
    
    try {
    $position_update = "UPDATE profile_picture SET positionX = " . $_POST['x'] . ", positionY = " . $_POST['y'] . " WHERE active = 1 AND uploaded_by = " . $_SESSION['user_id'];
    $valiant_db->query($position_update);
    
    require('change_profile_picture.php');
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
    
    $_SESSION['message'] = "Position saved.";
    header("Location: /account");
}

?>