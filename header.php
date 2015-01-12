<!DOCTYPE html>
<html>
<head>
	<title>McKay's Home Page</title>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="http://mckaysmalley.com/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="http://mckaysmalley.com/css/bootstrap.min.css" type="text/css"/>
	<link rel="stylesheet" href="css/general.css" type="text/css"/>
	<base href="http://php-smckaysmalley.rhcloud.com/"></base>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
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
                <li><a href="#">Cool Stuff</a></li>
                <li class="dropdown">
                  <a href="#assignments" class="dropdown-toggle" data-toggle="dropdown">Assignments <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu" id="assignments">
                    <li><a href="/assign01">Assign 01</a></li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        