<?php
session_start();

if ($_POST['password'] == $_POST['confirm'])
{
    require($_SERVER['DOCUMENT_ROOT'] . "/valiant_11/connect_to_db.php");
    
    if ($_POST['firstname'] == '')
        $firstname = $_SESSION['firstname'];
    else
        $firstname = htmlspecialchars($_POST['firstname']);
    
    if ($_POST['lastname'] == '')
        $lastname = $_SESSION['lastname'];
    else
        $lastname = htmlspecialchars($_POST['lastname']);
    
    if ($_POST['email'] == '')
        $email = $_SESSION['email'];
    else
        $email = htmlspecialchars($_POST['email']);
    
    $pass_query = "SELECT password FROM user WHERE id = " . $_SESSION['user_id'];
    $pass_result = $valiant_db->query($pass_query);
    $pass_row = $pass_result->fetch(PDO::FETCH_ASSOC);
    
    require($_SERVER['DOCUMENT_ROOT'] . '/password.php');
    
    if ($_POST['password'] == '')
        $password = $pass_row['password'];
    else
        $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    
    $user_insert = $valiant_db->prepare("UPDATE user SET firstname = :firstname, lastname = :lastname, email = :email, password = :password WHERE id = " . $_SESSION['user_id']);
    $user_insert->execute(array(':firstname' => $firstname, ':lastname' => $lastname, ':email' => $email, ':password' => $password));
    
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname']  = $lastname;
    $_SESSION['email']     = $email;
    $_SESSION['message'] = "Changes made!";
    header("Location: /account");    
}
else 
{
    $_SESSION['message'] = "Passwords do not match";
    header("Location: /account");
}

?>