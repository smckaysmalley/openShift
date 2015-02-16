<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/header.php');?>
<?php if (!isset($_SESSION[ 'user_id'])) header( "Location: /login"); ?>

<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">
                Profile Picture
            </div>
        </div>
        <div class='panel-body align-right'>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <?php echo $_SESSION[ 'profile_picture']; ?>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-sm-12">
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <div class="fileUpload btn btn-primary btn-xs">
                        <span>Choose file</span>
                        <input id="fileToUpload" name="fileToUpload" type="file" class="upload" />
                    </div>
                    <div class="input-group">
                        <input class="form-control" id="uploadFile" placeholder="Choose File" disabled="disabled" />
                        <div class="input-group-btn">
                            <input class="btn btn-primary" type="submit" value="Upload Image" name="submit">
                        </div>
                    </div>
                </form>


                <form action="change_position.php" method="POST">
                    <div class="input-group">
                        <span class="input-group-addon">X</span>
                        <input class="form-control" type="range" min="0" max="100" name="x" value="<?php echo $_SESSION['profile_x']; ?>" onchange="change();">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">Y</span>
                        <input class="form-control" type="range" min="0" max="100" name="y" value="<?php echo $_SESSION['profile_y']; ?>" onchange="change();">
                    </div>
                    <input type="submit" class="btn btn-primary btn-xs" value="Save Position">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Account Information
            </div>
        </div>
        <div class="panel-body center">
            <form action="submit_changes.php" method="POST">
                <div class="input-group">
                    <span class="input-group-addon">First Name</span>
                    <input class="form-control" type="text" name="firstname" value="<?php echo $_SESSION['firstname']; ?>">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Last Name</span>
                    <input class="form-control" type="text" name="lastname" value="<?php echo $_SESSION['lastname']; ?>">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Email</span>
                    <input class="form-control" type="text" name="email" value="<?php echo $_SESSION['email']; ?>">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Password</span>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Confirm</span>
                    <input class="form-control" type="password" name="confirm">
                </div>
                <input class="btn btn-primary" type="submit" value="Save Changes">
            </form>
        </div>
    </div>
</div>

<script>
    function change() {
        $('.profile_picture').css('background-position', $('input[name="x"]').val() + '% ' + $('input[name="y"]').val() + '%');
    }

    $("#fileToUpload").change(function () {
        $("#uploadFile").val(this.value);
    });
</script>

<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/footer.php'); ?>