<!DOCTYPE html>
<html>
<head>
	<title>Hello World</title>
	<meta http-equiv="refresh" content="20; url=http://mckaysmalley.com/" />
	<link rel="stylesheet" href="css/general.css" type="text/css"/>
</head>
<body>
	<h1>Hello World</h1>
	<p><?php 
            echo "Right now it is " . strftime(%A, %B, %d, %Y) . " where my server is."
        ?>
    </p>
</body>
</html>