<?php require( $_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>
<?php if (!$_SESSION["admin"]) {header("Location: /");} ?>
<?php
    if (isset($_POST["sql"]))
    {
        connectToDB();

        unset($_SESSION["bad_sql"]);
        $sql = $_POST["sql"];

        unset($_SESSION["query_response"]);
        if ($result = mysql_query($sql))
        {
            if(isset($result))
            {
                $_SESSION["query_response"] = getResponseTable($result);
            }
            $_SESSION["message"] = "Query Succeeded!";
            header("Location: /db.php");
        }
        else
        {
            $_SESSION["error"] = mysql_error();
            $_SESSION["bad_sql"] = $sql;
            echo $_SESSION["bad_sql"] . ' ' . $_SESSION["error"];
            header("Location: /db.php");
        }
        mysql_close();
    }
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">SQL Command: </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <form method="post" action="/db.php">
                    <textarea id="sql_command" rows="10" name="sql"><?php
                        if (isset($_SESSION["bad_sql"]))
                            echo $_SESSION["bad_sql"];
                    ?></textarea>
                <button type="submit" class="btn btn-primary">Submit Query</button>
                </form>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="well well-lg" height="500px"><?php
                    if (isset($_SESSION["query_response"]))
                        echo $_SESSION["query_response"];
                ?></div>
            </div>
        </div>
    </div>
</div>

<?php
connectToDB();

//loop to show all the tables and fields
$loop = mysql_query("SHOW tables")
or die ('cannot select tables');

while($table = mysql_fetch_array($loop)[0])
{
    if (strpos($table, "wp_") === FALSE)
        echo "<div class=\"panel panel-primary\">
                <div class=\"panel-heading\">
                    <div class=\"panel-title center\">
                        Table: $table
                    </div>
                </div>
                <div class=\"panel-body\">" .
                    getResponseTable(mysql_query("SELECT * FROM " . $table)) .
                "</div>
            </div>";
}

function connectToDB()
{
    //connection variables
    $host = "localhost";
    $database = "mckaysma_db";
    $user = "mckaysma_admin";
    $pass = "atlantic";

    //connection to the database
    mysql_connect($host, $user, $pass)
    or die ('cannot connect to the database: ' . mysql_error());

    //select the database
    mysql_select_db($database)
    or die ('cannot select database: ' . mysql_error());
}

function getResponseTable($result)
{
    $htmlTable = "<table cellpadding=\"2\" cellspacing=\"2\" border=\"0\" width=\"100%\">";

    $htmlTable .= "<tr bgcolor=\"#969696\">";
    for($i = 0; $i < mysql_num_fields($result); $i++)
    {
        $meta = mysql_fetch_field($result, $i);
        $htmlTable .= "<td>" . $meta->name . "</td>";
    }
    $htmlTable .= "</tr>";

    $rowCount = 0;
    while($row = mysql_fetch_row($result))
    {
        $htmlTable .= "<tr ";
        if ($rowCount++ % 2 == 0)
            $htmlTable .= "bgcolor=\"#CCCCCC\">";
        else
            $htmlTable .= "bgcolor=\"#FFFFFF\">";

        for($i = 0; $i < sizeof($row); $i++)
            $htmlTable .= "<td>" . $row[$i] . "</td>";
        $htmlTable .= "</tr>";
    }
    $htmlTable .= "</table>";

    return $htmlTable;
}
?>

<?php require( $_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>