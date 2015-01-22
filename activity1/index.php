<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/header.php'); ?>

<form action="process.php" method="post">
    <div class="well">
        <div class="form-group">
        <label for="name" class="control-label">Name:</label>
        <div class="">
            <input type="text" name="name">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="control-label">Email:</label>
        <div class="">
            <input type="email" name="email">
        </div>
    </div>
    <div class="form-group">
        <label for="major" class="control-label">Major:</label>
        <div class="">
            Computer Science:
            <input type="radio" name="major" value="Computer Science">
            <br/>Web Design and Development:
            <input type="radio" name="major" value="Web Design and Development">
            <br/>Computer Information Technology:
            <input type="radio" name="major" value="Computer Information Technology">
            <br/>Computer Engineering:
            <input type="radio" name="major" value="Coputer Engineering">
            <br/>
        </div>
    </div>
    <div class="form-group">
        <label for="place">Places Visited:</label>
        <div class="">
            North America
            <input type="checkbox" name="place[]" value="North America">
            <br/>South America:
            <input type="checkbox" name="place[]" value="South America">
            <br/>Europe:
            <input type="checkbox" name="place[]" value="Europe">
            <br/>Asia:
            <input type="checkbox" name="place[]" value="Asia">
            <br/>Austrailia:
            <input type="checkbox" name="place[]" value="Austrailia">
            <br/>Africa:
            <input type="checkbox" name="place[]" value="Africa">
            <br/>Antarctica:
            <input type="checkbox" name="place[]" value="Antarctica">
            <br/>
        </div>
    </div>
    <input class="btn btn-primary" type="submit">
    </div>
</form>

<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/footer.php'); ?>