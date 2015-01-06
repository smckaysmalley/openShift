<?php
	session_start();

	$firstname = $_POST["firstname"];
	$lastname  = $_POST["lastname"];
	$email     = $_POST["email"];
	$password  = $_POST["password"];
	$confirm   = $_POST["confirm"];

	$_SESSION["temp_firstname"] = $firstname;
	$_SESSION["temp_lastname"]  = $lastname;
	$_SESSION["temp_email"]     = $email;
	$_SESSION["temp_password"]  = $password;

	$servername = "localhost";
	$username   = "mckaysma_admin";
	$pwd        = "atlantic";
	$dbname     = "mckaysma_db";

	// Create connection
	$conn = mysqli_connect($servername, $username, $pwd, $dbname);
	if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

	if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE EMAIL = '" . $email . "'")) != 0)
	{
		unset($_SESSION["temp_password"]);
		$_SESSION["error"] = "An account with that email already exists. Please Login.";
		header("Location: /login");
	}
	else if($password == $confirm)
	{
		$sql = "INSERT INTO user (FIRST_NAME, LAST_NAME, EMAIL, ADMIN, PASSWORD, CREATION_DATE)
		VALUES ('".$firstname."', '".$lastname."', '".$email."', 0, '".$password."', UTC_DATE())";

		if(mysqli_query($conn, $sql))
		{
			$_SESSION["id"] = mysqli_fetch_row(mysqli_query($conn, "SELECT ID FROM user WHERE FIRST_NAME = " . $firstname . " AND LAST_NAME = " . $lastname . "AND EMAIL = " . $email))[0];
			$_SESSION["firstname"] = $firstname;
			$_SESSION["lastname"] = $lastname;
			$_SESSION["email"] = $email;
			$_SESSION["message"] = "Account created!";

			unset($_SESSION["temp_firstname"]);
			unset($_SESSION["temp_lastname"]);
			unset($_SESSION["temp_email"]);
			unset($_SESSION["temp_password"]);

			header('Location: /');
		}
		else
		{
			$_SESSION["error"] = "Could not create account. Try again.";
			header("Location: /creat_account");
		}
	}	
	else
	{
		unset($_SESSION["temp_password"]);
		$_SESSION["error"] = "Try again: passwords do not match";
		header("Location: /create_account");
	}
?>


