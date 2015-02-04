<?php require( $_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>
<?php
	if (isset($_POST["email"])) {$_SESSION["temp_email"] = $_POST["email"];}
	if (isset($_POST["password"])) {$_SESSION["temp_password"] = $_POST["password"];}
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title">
			Create Account
		</div>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form" method="post" action="/create_account/submit_account.php">
		  <div class="form-group">
		    <label for="inputFirst" class="col-sm-2 control-label">First Name</label>
		    <div class="col-sm-10">
		      <input type="name" class="form-control" id="inputFirst" placeholder="First Name" name="firstname"
		      <?php if (isset($_SESSION["temp_firstname"])) {echo "value=\"" . $_SESSION["temp_firstname"] . "\"";} ?>>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputLast" class="col-sm-2 control-label">Last Name</label>
		    <div class="col-sm-10">
		      <input type="name" class="form-control" id="inputLast" placeholder="Last Name" name="lastname"
		      <?php if (isset($_SESSION["temp_lastname"])) {echo "value=\"" . $_SESSION["temp_lastname"] . "\"";} ?>>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email"
		      <?php if (isset($_SESSION["temp_email"])) {echo "value=\"" . $_SESSION["temp_email"] . "\"";} ?>>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password"
		      <?php if (isset($_SESSION["temp_password"])) {echo "value=\"" . $_SESSION["temp_password"] . "\"";} ?>>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputConfirm" class="col-sm-2 control-label">Confirm Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="inputConfirm" placeholder="Confirm Password" name="confirm">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="student" class="col-sm-2 control-label">Are you in my Valient 11 class?</label>
		    <div class="col-sm-10">
		      <input type="checkbox" id="student" name="student">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Submit</button>
		    </div>
		  </div>
		</form>
	</div>
</div>
<?php require( $_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>