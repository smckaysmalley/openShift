<?php
	session_start();

	$firstname = $_POST["firstname"];
	$lastname  = $_POST["lastname"];
	$email     = $_POST["email"];
	$password  = $_POST["password"];
	$confirm   = $_POST["confirm"];
	if ($_POST["student"])
		$student = 1;
	else
		$student = 0;


	$_SESSION["temp_lastname"]  = $lastname;
	$_SESSION["temp_firstname"] = $firstname;
	$_SESSION["temp_email"]     = $email;
	$_SESSION["temp_password"]  = $password;

    include( $_SERVER['DOCUMENT_ROOT'] . '/localsetup.php');
    $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
    $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
    $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
    $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');

	// Create connection
	$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, 'valiant_11');
	if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

	if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE EMAIL = '" . $email . "'")) != 0)
	{
		unset($_SESSION["temp_password"]);
		$_SESSION["error"] = "An account with that email already exists. Please Login.";
		header("Location: /login");
	}
	else if($password == $confirm)
	{
		$sql = "INSERT INTO user (firstname, lastname, email, student, teacher, admin, password, creation_date)
		VALUES ('".$firstname."', '".$lastname."', '".$email . "', " . $student. ", 0, 0, '" .$password."', NOW())";

		if(mysqli_query($conn, $sql))
		{
			$_SESSION["id"] = mysqli_fetch_row(mysqli_query($conn, "SELECT ID FROM user WHERE FIRST_NAME = " . $firstname . " AND LAST_NAME = " . $lastname . "AND EMAIL = " . $email))[0];
			$_SESSION["firstname"] = $firstname;
			$_SESSION["lastname"]  = $lastname;
			$_SESSION["email"]     = $email;
            $_SESSION["student"]   = $student;
            $_SESSION["admin"]     = 0;
            $_SESSION["teacher"]   = 0;
			$_SESSION["message"]   = "Welcome aboard $firstname!";

			unset($_SESSION["temp_firstname"]);
			unset($_SESSION["temp_lastname"]);
			unset($_SESSION["temp_email"]);
			unset($_SESSION["temp_password"]);

			header('Location: /');
		}
		else
		{
			$_SESSION["error"] = "Could not create account. Try again." . mysqli_error($conn);
			header("Location: /create_account");
		}
	}	
	else
	{
		unset($_SESSION["temp_password"]);
		$_SESSION["error"] = "Try again: passwords do not match";
		header("Location: /create_account");
	}
?>


