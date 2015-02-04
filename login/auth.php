<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
$_SESSION["temp_email"] = $email;
$_SESSION["temp_password"] = $password;

if ($email && $password) 
{
    include( $_SERVER['DOCUMENT_ROOT'] . "/localsetup.php");
    $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
    $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
    $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
    
	// Create connection
	$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, 'valiant_11');
	if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

   	$sql = "SELECT * FROM user WHERE EMAIL = '" . $email . "'";
	if ($emailCheck = mysqli_query($conn, $sql))
	{
		$numrows = mysqli_num_rows($emailCheck);
		$row = mysqli_fetch_array($emailCheck);

		if($numrows == 1 && $row['password'] == $password)
		{
			$_SESSION["user_id"]   = $row['id'];
			$_SESSION["firstname"] = $row['firstname'];
			$_SESSION["lastname"]  = $row['lastname'];
			$_SESSION["email"]     = $row['email'];
			$_SESSION["admin"]     = $row['admin'];
            $_SESSION["teacher"]   = $row['teacher'];
			$_SESSION["student"]   = $row['student'];
			unset($_SESSION["temp_email"]);
			unset($_SESSION["temp_password"]);
			header("Location: /");
		}
		else if ($numrows == 0)
		{
			$_SESSION["error"] = "Please create an account.";
			header("Location: /create_account");
		}
		else if ($row['password'] != $password)
		{
			unset($_SESSION["temp_password"]);
			$_SESSION["error"] = "Incorrect password.";
			header("Location: /login");
		}
		else
		{
			$_SESSION["error"] = "Something went horribly wrong. Try again.";
			header("Location: /login");
		}
	}
	else 
	{
		$_SESSION["error"] = "Query Failed... :(" . mysqli_error($conn);
		header("Location: /");
	}
}
else
{
	$_SESSION["error"] = "You must enter an email and password.";
	header("Location: /login");
}
mysqli_close($conn);

?>