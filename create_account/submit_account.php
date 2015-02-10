<?php
session_start();

if ($_POST["student"])
    $student = 1;
else
    $student = 0;


$_SESSION["temp_lastname"]  = $_POST["lastname"];
$_SESSION["temp_firstname"] = $_POST["firstname"];
$_SESSION["temp_email"]     = $_POST["email"];
$_SESSION["temp_password"]  = $_POST["password"];

require($_SERVER['DOCUMENT_ROOT'] . "/valiant_11/connect_to_db.php");

$email_query = $valiant_db->prepare("SELECT * FROM user WHERE email = :email");
$email_query->execute(array(':email' => $_POST['email']));

if ($email_query->rowCount() != 0) {
    
    unset($_SESSION["temp_password"]);
    $_SESSION["error"] = "An account with that email already exists. Please Login.";
    header("Location: /login");
}

else if($_POST["password"] == $_POST["confirm"]) {
    
    try {
        $create_query = $valiant_db->prepare("INSERT INTO user (firstname, lastname, email, student, teacher, admin, password, creation_date) VALUES (:firstname, :lastname, :email, :student, 0, 0, :password, NOW())");
        $create_query->execute(array(':firstname' => $_POST['firstname'], ':lastname' => $_POST['lastname'], ':email' => $_POST['email'], ':student' => $student, ':password' => $_POST['password']));
        
        $id_query = $valiant_db->prepare("SELECT id FROM user WHERE firstname = :firstname AND lastname = :lastname AND email = :email");
        $id_query->execute(array(':firstname' => $_POST['firstname'], ':lastname' => $_POST['lastname'], ':email' => $_POST['email']));
        $id_row = $id_query->fetch(PDO::FETCH_ASSOC);

        $_SESSION["user_id"]        = $id_row['id'];
        $_SESSION["firstname"] = $_POST["firstname"];
        $_SESSION["lastname"]  = $_POST["lastname"];
        $_SESSION["email"]     = $_POST["email"];
        $_SESSION["student"]   = $student;
        $_SESSION["admin"]     = 0;
        $_SESSION["teacher"]   = 0;
        $_SESSION["message"]   = "Welcome aboard " . $_POST["firstname"] . "!";
        
        $picture_query = "INSERT INTO profile_picture (filename, positionX, positionY, active, uploaded_by, creation_date) VALUES ('default_profile.jpg', 50, 50, 1, " . $_SESSION['user_id'] . ", NOW())";
        $valiant_db->query($picture_query);
        
        require($_SERVER['DOCUMENT_ROOT'] . "/account/change_profile_picture.php");

        unset($_SESSION["temp_firstname"]);
        unset($_SESSION["temp_lastname"]);
        unset($_SESSION["temp_email"]);
        unset($_SESSION["temp_password"]);

        $valiant_db = null;
        header('Location: /');
    }
    
    catch (Exception $e) {
        $_SESSION["error"] = "Could not create account. Try again." . $e->getMessage();
        header("Location: /create_account");
    }
}	
else {
    unset($_SESSION["temp_password"]);
    $_SESSION["error"] = "Try again: passwords do not match";
    header("Location: /create_account");
}
?>


