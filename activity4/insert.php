<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/header.php'); ?>

<div class="well">
    <form action="insert_db.php" method="post">
        Book: <input type="text" name="book"><br/>
        Chapter: <input type="text" name="chapter"><br/>
        Verse: <input type="text" name="verse"><br/>
        Content: <input type="text" name="content"><br/>
        <div class="input-group">
            <?php require("connect_to_db.php");

            $topic_query = "SELECT name FROM topics";
            $topic_result = $faith_db->query($topic_query);

            while ($topic_row = $topic_result->fetch(PDO::FETCH_ASSOC))
                echo $topic_row['name']. ": <input type='checkbox' name='topic[]' value='" . $topic_row['name'] . "'><br/>";

            $faith_db = null;
            ?>
        </div>
        <input class="btn btn-primary" type="submit">
    </form>
</div>

<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/footer.php'); ?>