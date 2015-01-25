<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/header.php');?>
<?php
    if($_COOKIE['survey_completion'] == "6")
        header("Location: /php_survey/results");
?>
<link href="/css/survey.css" type="text/css" rel="stylesheet">

<div class="jumbotron center">
    <h2>Ski Resort Survey</h2>
    <br/>
    <p>Please take some time to rate the ski resorts below!</p>
    <p class="small">Vote on which ever you like. You can submit them in parts!</p>
</div>
<br/>

<form action="submit.php" method="POST">
   
<?php 
    if (isset($_COOKIE['resorts']))
        $taken = $_COOKIE['resorts'];
    else
        $taken = '';

    if (!strstr($taken, 'targhee')) include('targhee.php');

    if (!strstr($taken, 'jackson')) include('jackson.php');

    if (!strstr($taken, 'kelly')) include('kelly.php');

    if (!strstr($taken, 'park_city')) include('park_city.php');

    if (!strstr($taken, 'deer_valley')) include('deer_valley.php');

    if (!strstr($taken, 'vail')) include('vail.php');
?>

    <div class="form-group center">
        <input type="submit" class="btn btn-primary" value="Submit">
        <a href="results/" class="btn btn-default">See Results</a>
    </div>
</form>

<script type="text/javascript" src="verify.js"></script>

<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/footer.php'); ?>