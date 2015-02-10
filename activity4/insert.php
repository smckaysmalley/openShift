<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/header.php'); ?>

<style>
    #news {
        display: none;
    }
</style>

<div id="news" class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <div id="message"></div>
</div>

<div class="well">
    <section>
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
        <input class="btn btn-primary" onclick="addScripture();" type="submit">
    </section>
</div>

<script>
    function addScripture() {
            $.post("insert_db.php", {
                    book: $('input[name="book"]').val(),
                    chapter: $('input[name="chapter"]').val(),
                    verse: $('input[name="verse"]').val(),
                    content: $('input[name="content"]').val()
                }, function (response) {
                if (response) {
                    $('#message').html('Inserted!');
                    $('#news').removeClass('alert-danger').addClass('alert-success').show();
                }
                else {
                    $('#message').html('Failed');
                    $('#news').removeClass('alert-success').addClass('alert-danger').show();
                }
            }
                  )};
</script>

<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/footer.php'); ?>