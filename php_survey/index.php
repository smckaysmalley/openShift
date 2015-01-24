<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/header.php');?>
<?php
    if (isset($_COOKIE["ski_survey"]))
        header("Location: /php_survey/results");
?>
<link href="/css/survey.css" type="text/css" rel="stylesheet">

<div class="jumbotron center">
    <h2>Ski Resort Survey</h2>
    <br/>
    <p>Please take some time to rate the ski resorts below!</p>
    <p class="small">Rake which ever you like. You can submit them in parts!</p>
</div>
<br/>

<form action="submit.php" method="POST">
   
<?php if (!isset($_COOKIE['targhee'])) include('targhee.php'); ;?>

<?php if (!isset($_COOKIE['jackson'])) include('jackson.php'); ;?>
    
<?php if (!isset($_COOKIE['kelly'])) include('kelly.php'); ;?>

<?php if (!isset($_COOKIE['park_city'])) include('park_city.php'); ;?>

<?php if (!isset($_COOKIE['deer_valley'])) include('deer_valley.php'); ;?>
    
<?php if (!isset($_COOKIE['vail'])) include('vail.php'); ;?>

    <div class="form-group center">
        <input type="submit" class="btn btn-default" value="Submit">
        <a href="results/" class="btn btn-default">See Results</a>
    </div>
</form>

<script type="text/javascript" src="verify.js"></script>

<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/footer.php'); ?>