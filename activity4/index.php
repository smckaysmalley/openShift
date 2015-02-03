<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/header.php'); ?>
<?php
    include( $_SERVER['DOCUMENT_ROOT'] . '/setDBvariables.php');
    $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
    $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
    $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
    $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
    $db = new PDO('mysql:host=localhost;dbname=faith;charset=latin1', $dbUser, $dbPassword, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    if (isset($_GET['search']))
    {
        $search = $_GET['search'];
        $sql = $db->prepare('SELECT book, chapter, verse, content FROM scriptures WHERE book LIKE ?');
        $sql->bindValue(1, "%$search%", PDO::PARAM_STR);
        $result = $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    else 
    {
        $sql = $db->query('SELECT book, chapter, verse, content FROM scriptures');
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    echo "<div class='panel panel-primary'>
            <div class='panel-heading'>
                <div class='panel-title'>Scriptures</div>
            </div>
            <div class='panel-body'>";
    echo "<table class='table'>
            <thead><tr><td>Book</td><td>Chapter</td><td>Verse</td><td>Content</td></thead>
            <tbody class='table-hover'>";
    
    foreach($result as $row)
    {
        echo"<tr>";
        foreach($row as $col)
        {
            echo "<td>" . $col . "</td>";
        }
        echo "</td>";
    }
    echo "</tbody></table>";
    echo "</div></div>";

    echo "<form action='index.php' type='GET'>";

    echo "<input type='text' name='search' placeholder='book'>";

    echo "</form>"
?>
<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/footer.php'); ?>