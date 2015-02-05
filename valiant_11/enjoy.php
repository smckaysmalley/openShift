<?php

if (isset($_POST))
{
    include('connect_to_db.php');
    
    $check_query = "SELECT count(*) as 'enjoys' FROM enjoy WHERE enjoyed_by = " . $_POST['user'] . " AND parent = " . $_POST['parent'];
    if (mysqli_fetch_assoc(mysqli_query($conn, $check_query))['enjoys'] == 0)
    {
        $enjoy_insert = "INSERT INTO enjoy (parent, enjoyed_by, creation_date) VALUES (" . $_POST['parent'] . ", " . $_POST['user'] . ", NOW())";
        mysqli_query($conn, $enjoy_insert);
    }
    
    $count_query = "SELECT count(*) as 'enjoys' FROM enjoy WHERE parent = " . $_POST['parent'];
    $count = mysqli_fetch_assoc(mysqli_query($conn, $count_query));

    echo $count['enjoys'];
    $conn->close();
}
?>