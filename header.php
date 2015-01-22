
<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>McKay Smalley</title>
    <link rel="stylesheet" href="http://mckaysmalley.com/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="/css/general.css" type="text/css" />
    <link rel="shortcut icon" href="mountain-128.png">
    <!-- <base href="http://php-smckaysmalley.rhcloud.com/"></base> -->
</head>

<body>
    <main class="container">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Home</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="/cool_stuff">Cool Stuff</a>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#assignments" role="button" aria-expanded="false">Assignments<b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/assign01">Assign 01</a>
                                </li>
                                <li><a href="/php_survey/">PHP Survey</a>
                                </li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="team" rol="button" aria-expanded="false">Team Activities<b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/activity1">Post Method</a>
                                </li>
                            </ul>
                        </li>
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