<?php
session_start();
$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/images/user_profiles/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists
if (file_exists($target_file)) {
    $_SESSION['error'] = "That file already exists." . $target_file;
    header("Location: /account");
}
// Check file size
else if ($_FILES["fileToUpload"]["size"] > 1000000) {
    $_SESSION['error'] = "Sorry, your file is too large.";
    header("Location: /account");
}
// Allow certain file formats
else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG files are allowed.";
    header("Location: /account");
}
else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        require($_SERVER['DOCUMENT_ROOT'] . '/valiant_11/connect_to_db.php');
        
        $valiant_db->query("UPDATE profile_picture SET active = 0 WHERE uploaded_by = " . $_SESSION['user_id']);
        
        $profile_query = "INSERT INTO profile_picture (filename, positionX, positionY, active, uploaded_by, creation_date) VALUES ('" . basename($_FILES["fileToUpload"]["name"]) . "', 50, 50, 1, " . $_SESSION['user_id'] . ", NOW())";
        $profile_result = $valiant_db->query($profile_query);
        
        require('change_profile_picture.php');
        
        $_SESSION['message'] = "Successfully changed profile picture to: ". basename( $_FILES["fileToUpload"]["name"]);
        
        $valiant_db = null;
    } 
    else {
        $_SESSION['error'] = "Sorry, there was an error uploading your file.";
    }
    header("Location: /account");
}
?>