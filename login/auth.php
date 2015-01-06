<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
$_SESSION["temp_email"] = $email;
$_SESSION["temp_password"] = $password;

if ($email && $password) 
{
	$servername = "localhost";
	$username   = "mckaysma_admin";
	$pwd        = "atlantic";
	$dbname     = "mckaysma_db";

	// Create connection
	$conn = mysqli_connect($servername, $username, $pwd, $dbname);
	if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

   	$sql = "SELECT * FROM user WHERE EMAIL = '" . $email . "'";
	if ($emailCheck = mysqli_query($conn, $sql))
	{
		$numrows = mysqli_num_rows($emailCheck);
		$row = mysqli_fetch_array($emailCheck);

		if($numrows == 1 && $row['PASSWORD'] == $password)
		{
			$_SESSION["id"]        = $row['ID'];
			$_SESSION["firstname"] = $row['FIRST_NAME'];
			$_SESSION["lastname"]  = $row['LAST_NAME'];
			$_SESSION["email"]     = $row['EMAIL'];
			$_SESSION["admin"]     = $row['ADMIN'];
			$_SESSION["student"]   = $row['STUDENT'];
			unset($_SESSION["temp_email"]);
			unset($_SESSION["temp_password"]);
			header("Location: /");
		}
		else if ($numrows == 0)
		{
			$_SESSION["error"] = "Please create an account.";
			header("Location: /create_account");
		}
		else if ($row['PASSWORD'] != $password)
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
		$_SESSION["error"] = "No, no, no " . mysqli_error($conn);
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