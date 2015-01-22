<?php
    if(isset($_COOKIE['page_visits']))
        setcookie('page_visits', ++$_COOKIE['page_visits'], time() + 8450);
    else
        setcookie('page_visits', 1, time() + 8450);

    if (!isset($_SESSION['visits']))
        $_SESSION['visits'] = 1;
?>

<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/header.php'); ?>

    <div class="well">
       <h2>Count with cookies</h2>
        <p>You have visited this page 
        <?php 
            if (isset($_COOKIE['page_visits']))
                echo $_COOKIE['page_visits'];
            else
                echo 1;
        ?> times.</p>
    </div>
    
    <div class="well">
       <h2>Count with sessions</h2>
        <p>You have visited this page 
        <?php
            echo ++$_SESSION['visits'];
        ?> times.</p>
    </div>

<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/footer.php'); ?>