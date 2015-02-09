<?php
session_start();
var_dump($_FILES);
var_dump($_POST);
$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/images/user_profiles/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists
if (file_exists($target_file)) {
    $_SESSION['error'] = "That file already exists." . $target_file;
    //header("Location: /account");
}
// Check file size
else if ($_FILES["fileToUpload"]["size"] > 500000) {
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
        $profile_code = "<img title='Profile' alt='profile_picture' class='profile_picture' src='/images/user_profiles/" . basename($_FILES["fileToUpload"]["name"]) . "'/>";
        
        $profile_query = "UPDATE user SET profile_picture = \"" . $profile_code . "\" WHERE id = " . $_SESSION['user_id'];
        echo $profile_query;
        try{
        $profile_result = $valiant_db->query($profile_query);}
        catch (Exception $e) {
            echo $e->getMessage();
        }
        
        $valiant_db = null;
        $_SESSION['message'] = "Successfully changed profile picture to: ". basename( $_FILES["fileToUpload"]["name"]);
    } 
    else {
        $_SESSION['error'] = "Sorry, there was an error uploading your file.";
    }
    //header("Location: /account");
}
?>