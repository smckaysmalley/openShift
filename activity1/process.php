<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/header.php'); ?>
<div class="well">
<?php
    if (isset($_POST))
    {
        if (isset($_POST['name']))
            echo "Name: " . $_POST['name'] . "<br>";
        if (isset($_POST['email']))
            echo "Email: <a href=\"mailto:" . $_POST["email"] . "\">" . $_POST["email"] . "</a><br/>";
        if (isset($_POST['major']))
            echo "Major: " . $_POST["major"]. "<br>";
        if (isset($_POST['place']))
        {
            echo "Places: <br/>";
            foreach($_POST['place'] as $place)
                echo $place . "<br>";
        }
    }
    else
        echo "Did not receive post";
?>
</div>
<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/footer.php'); ?>