<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/header.php');?>
<?php 
if (!isset($_SESSION['user_id']))
    header("Location: /login");
?>

<div class='well'>
<?php
require($_SERVER['DOCUMENT_ROOT'] . "/valiant_11/connect_to_db.php");

$profile_query = "SELECT profile_picture FROM user WHERE id = " . $_SESSION['user_id'];
$profile_result = $valiant_db->query($profile_query);
$profile_row = $profile_result->fetch(PDO::FETCH_ASSOC);
echo "<span class='thumbnail profile_preview'>" . $profile_row['profile_picture'] . "</span>";
?>

<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input id="uploadFile" placeholder="Choose File" disabled="disabled" />
    <div class="fileUpload btn btn-primary btn-xs">
        <span>Choose file</span>
        <input id="fileToUpload" name="fileToUpload" type="file" class="upload" />
    </div>
    <input class="btn btn-primary btn-xs" type="submit" value="Upload Image" name="submit">
</form>

<script>
    $("#fileToUpload").change(function () {
        $("#uploadFile").val(this.value);
    });
</script>

<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/footer.php'); ?>