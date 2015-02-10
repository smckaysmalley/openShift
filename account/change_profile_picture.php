<?php
$settings_query = "SELECT filename, positionX as 'x', positionY as 'y' FROM profile_picture WHERE active = 1 AND uploaded_by = " . $_SESSION['user_id'];
$settings_result = $valiant_db->query($settings_query);
$profile_row = $settings_result->fetch(PDO::FETCH_ASSOC);

$_SESSION['profile_picture']   = "<div class='profile_picture' style='background-image: url(\"/images/user_profiles/" . $profile_row['filename'] . "\"); background-position:".$profile_row['x'].'% '.$profile_row['y']."%;'></div>";
$_SESSION['profile_x'] = $profile_row['x'];
$_SESSION['profile_y'] = $profile_row['y'];
?>