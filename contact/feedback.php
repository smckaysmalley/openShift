<?php require( $_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>
<div class="col-lg-6 col-lg-offset-3">
	<div class="progress row">
	  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
	</div>
	<div class="center">
		Sending Feedback...
	</div>
</div>
<br/>
<div class="row">
	<?php

		if (mail("smckaysmalley@outlook.com", "test", "test", "From: test@test.com"))
			echo "success";
		else
			echo "sucks to be you!";

		// $header = "From: admin@mckaysmalley.com";
		// $to = "smckaysmalley@gmail.com";
		// $subject = "Feedback from mckaysmalley.com";
		// $email  = "From: ".$_POST["first_name"]." ".$_POST["last_name"]."\r\n";
		// $email .= "Feedback: ".$_POST["feedback"];
		// $email = wordwrap($email,70);
		// mail($to, $subject, $email, $header)

		// if (mail($to, $subject, $email, $header)) 
		// {
		// 	echo("<p>Email successfully sent!</p>");
		// } 
		// else 
		// {
		// 	echo("<p>Email delivery failed…</p>");
		// }
	?>
</div>
<?php require( $_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>