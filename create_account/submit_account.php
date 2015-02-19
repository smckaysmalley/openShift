<?php
session_start();

if (isset($_POST['student']))
{
    if ($_POST["student"])
        $student = 1;
    else
        $student = 0;
}
else
    $student = 0;


$_SESSION["temp_lastname"]  = htmlspecialchars($_POST["lastname"]);
$_SESSION["temp_firstname"] = htmlspecialchars($_POST["firstname"]);
$_SESSION["temp_email"]     = htmlspecialchars($_POST["email"]);
$_SESSION["temp_password"]  = htmlspecialchars($_POST["password"]);

require($_SERVER['DOCUMENT_ROOT'] . "/valiant_11/connect_to_db.php");

$email_query = $valiant_db->prepare("SELECT * FROM user WHERE email = :email");
$email_query->execute(array(':email' => $_POST['email']));

if ($email_query->rowCount() != 0) {
    
    unset($_SESSION["temp_password"]);
    $_SESSION["error"] = "An account with that email already exists. Please Login.";
    header("Location: /login");
}

else if($_POST["password"] == $_POST["confirm"]) {
    
    require($_SERVER['DOCUMENT_ROOT'] . '/password.php');
    
    $passwordHash = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    
    try {
        $create_query = $valiant_db->prepare("INSERT INTO user (firstname, lastname, email, student, teacher, admin, password, creation_date) VALUES (:firstname, :lastname, :email, :student, 0, 0, :password, NOW())");
        $create_query->execute(array(':firstname' => $firstname, ':lastname' => $lastname, ':email' => $email, ':student' => $student, ':password' => $passwordHash));
        
        $id_query = $valiant_db->prepare("SELECT id FROM user WHERE firstname = :firstname AND lastname = :lastname AND email = :email");
        $id_query->execute(array(':firstname' => $_POST['firstname'], ':lastname' => $_POST['lastname'], ':email' => $_POST['email']));
        $id_row = $id_query->fetch(PDO::FETCH_ASSOC);

        $_SESSION["user_id"]        = $id_row['id'];
        $_SESSION["firstname"] = $firstname;
        $_SESSION["lastname"]  = $lastname;
        $_SESSION["email"]     = $email;
        $_SESSION["student"]   = $student;
        $_SESSION["admin"]     = 0;
        $_SESSION["teacher"]   = 0;
        $_SESSION["message"]   = "Welcome aboard " . $firstname . "!";
        
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


