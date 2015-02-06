<?php require( $_SERVER['DOCUMENT_ROOT'] . '/header.php'); if (isset($_SESSION['firstname'])) {header("Location: /");}?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title">
			Login
		</div>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form" method="post" action="/login/auth.php">
          <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
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
		  <!-- <div class="form-group">
		    <label for="rememberMe" class="col-sm-2 control-label">Remember Me</label>
		    <div class="col-sm-10">
		      <input type="checkbox" id="rememberMe" name="rememberMe">
		    </div>
		  </div> -->
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-primary">Submit</button>
		      <button onsubmit="create()" formaction="/create_account" formmethod="post" class="btn btn-default">Create Account</button>
		    </div>
		  </div>
		</form>
	</div>
</div>
<script
<?php require( $_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>