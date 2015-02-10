<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
if (isset($_POST['redirect_to']))
    $redirect = $_POST['redirect_to'];
else
    $redirect = "/";
$_SESSION["temp_email"] = $email;
$_SESSION["temp_password"] = $password;

if ($email && $password) 
{
    require($_SERVER['DOCUMENT_ROOT'] . "/valiant_11/connect_to_db.php");
   	$user_query = $valiant_db->prepare("SELECT * FROM user WHERE EMAIL = :email");
    
	try
	{
		$user_query->execute(array(':email' => $email));
        $user_row = $user_query->fetch(PDO::FETCH_ASSOC);

		if($user_query->rowCount() == 1 && $user_row['password'] == $password)
		{
			$_SESSION["user_id"]   = $user_row['id'];
			$_SESSION["firstname"] = $user_row['firstname'];
			$_SESSION["lastname"]  = $user_row['lastname'];
			$_SESSION["email"]     = $user_row['email'];
			$_SESSION["admin"]     = $user_row['admin'];
            $_SESSION["teacher"]   = $user_row['teacher'];
			$_SESSION["student"]   = $user_row['student'];
            
            require($_SERVER['DOCUMENT_ROOT'] . "/account/change_profile_picture.php");
            
			unset($_SESSION["temp_email"]);
			unset($_SESSION["temp_password"]);
			header("Location: " . $redirect);
		}
		else if ($user_query->rowCount() == 0)
		{
			$_SESSION["error"] = "Please create an account.";
			header("Location: /create_account");
		}
		else if ($user_row['password'] != $password)
		{
			unset($_SESSION["temp_password"]);
			$_SESSION["error"] = "Incorrect password";
			header("Location: /login");
		}
		else
		{
			$_SESSION["error"] = "Something went horribly wrong. Try again.";
			header("Location: /login");
		}
	}
	catch (Exception $e)
	{
		$_SESSION["error"] = "Query Failed... :( " . $e->getMEssage;
		header("Location: /");
	}
    
    //close the connection
    $valiant_db = null;
}
else
{
	$_SESSION["error"] = "You must enter an email and password.";
	header("Location: /login");
}
mysqli_close($conn);

?>