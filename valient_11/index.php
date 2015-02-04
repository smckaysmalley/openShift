<?php require( $_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>
<?php
	if ($_SESSION["admin"])
	{
		echo "<div class='container center'><button class='btn btn-primary' data-target='#addModal' data-toggle='modal'>Add Content</button></div><br/>";
		echo "
			<!-- Modal -->
			<div class='modal fade' id='addModal' role='dialog'>
			  <div class='modal-dialog'>
			    <div class='modal-content'>
			      <div class='modal-header'>
			        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
			          &times;
			        </button>
			        <h4 class='modal-title' id='myModalLabel'>
			          Add Content
			        </h4>
			      </div>
			      <div class='modal-body'>
			        <form method='post' action='/valient_11/insert.php'>
			          <div class='form-group'>
			            <label for='inputTitle' class='col-sm-2 control-label'>
			              Title
			            </label>
			            <div class='col-sm-10'>
			              <input type='text' class='form-control' id='inputTitle' placeholder='Title' name='title'>
			            </div>
			          </div>
			          <br/>
			          <div class='form-group'>
			            <label for='inputType' class='col-sm-2 control-label'>
			              Type
			            </label>
			            <div class='col-sm-10'>
			              <select class='form-control' id='inputType' name='type' onchange='updatecontentlabel();'>
			                <option>
			                </option>
			                <option value='youtube'>
			                  Youtube
			                </option>
			                <option value='text'>
			                  Text
			                </option>
			                <option value='picture'>
			                  Picture
			                </option>
			              </select>
			            </div>
			          </div>
			          <br/>
			          <div class='form-group'>
			            <label for='inputContent' id='content' class='col-sm-2 control-label'>
			            </label>
			            <div class='col-sm-10'>
			              <textarea class='form-control' id='inputContent' name='content'></textarea>
			            </div>
			          </div>
			          <button type='submit' class='btn btn-primary'>
			            Submit
			          </button>
			        </form>
			      </div>
			    </div>
			  </div>
			</div>";
	}

function getContent()
{
    include( $_SERVER['DOCUMENT_ROOT'] . "/localsetup.php");
    $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
    $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
    $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');

	// Create connection
	$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, 'valient_11');
	if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

	$sql ="SELECT title, content FROM material ORDER BY creation_date DESC LIMIT 10";
	$result = mysqli_query($conn, $sql);

	$content = "<div class='container'>";
	while ($row = mysqli_fetch_assoc($result)) 
	{
		$content .= "
		<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
			<div class='panel panel-primary'>
				<div class='panel-heading'>
					<div class='panel-title'>
					" .	$row['title'] . "
					</div>
				</div>
				<div class='panel-body center'>
				" .	$row['content'] . "
				</div>
			</div>
		</div>";
	}
	$content .= "</div>";

	$conn->close();
	return $content;
}

	echo getContent();
?>

<script type="text/javascript">
    
    function updatecontentlabel()
    {
        var type = $('#inputType').val();

        if (type == 'youtube' || type == 'picture')
            $('#content').html("URL");
        else if (type == 'text')
            $('#content').html("Content");
    }
    
</script>

<?php require( $_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>