<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>McKay Smalley</title>
    <meta name="author" content="McKay Smalley">
    <link rel="shortcut icon" href="/images/mountain-128.png">
    <link rel="stylesheet" href="http://mckaysmalley.com/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="/css/general.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <main class="container">
        <?php
            include('navbar.php');
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