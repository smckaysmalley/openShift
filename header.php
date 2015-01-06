<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<meta content="utf-8" http-equiv="encoding">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="McKay Smalley">
	<base href="http://php-smckaysmalley.rhcloud.com/"></base>
	<title>McKay Smalley</title>
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="shortcut icon" href="images/icon.png">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse glass" role="navigation">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="/">
		      	<img alt="Home" src="images/icon.png" width="20px"/>
		      </a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="navbar">
		      <ul class="nav navbar-nav navbar-left">
		        <li><a href="/about">About</a></li>
		        <li><a href="projects">Projects</a></li>
		        <li role="presentation" class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#classes" role="button" aria-expanded="false">Classes <b class="caret"></b></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="/cs213">CS 213</a></li>
						<li><a href="/cs313">CS 313</a></li>
						<li><a href="/cit225">CIT 225</a></li>
					</ul>
				</li>
				<li><a href="blog">Blog</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="contact">Contact</a></li>
		        <?php 
			        if (isset($_SESSION["firstname"]))
			        {
			        	echo 
		"				<li role=\"presentation\" class=\"dropdown\">
							<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#classes\" role=\"button\" aria-expanded=\"false\">" . $_SESSION["firstname"] . " <b class=\"caret\"></b></a>
							<ul class=\"dropdown-menu\" role=\"menu\">
								<li><a href=\"#\">My Account</a></li>";
								if($_SESSION["admin"])
									echo 
			"						<li><a href=\"/db.php\">Database</a></li>";
							echo
			"					<li><a href=\"/logout.php\">Logout</a></li>
							</ul>
						</li>";
			        }
			        else
			        {
			        	echo
		"		        <li><a href=\"login\">Login</a></li>";
					}
		        ?>
		      </ul>
		    </div>
		  </div>
		</nav>
<?php
	if (isset($_SESSION["error"]))
	{
        echo 
            "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
              <strong>ERROR: </strong>" . $_SESSION["error"] . "
            </div>";
        unset($_SESSION["error"]);
	}
	if (isset($_SESSION["message"]))
	{
        echo 
            "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
              " . $_SESSION["message"] . "
            </div>";
        unset($_SESSION["message"]);
	}
?>
		