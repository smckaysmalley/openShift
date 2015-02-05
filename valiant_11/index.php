<?php require( $_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>
<?php
if (isset($_SESSION['admin']) || isset($_SESSION['teacher']))
{
	if ($_SESSION["admin"] || $_SESSION["teacher"])
	{
		echo "<div class='center'><button class='btn btn-primary' data-target='#addModal' data-toggle='modal'>Add Content</button></div><br/>";
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
			        <form method='post' action='/valiant_11/insert.php'>
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
}

$class_member = false;
if (isset($_SESSION['admin']))
{
    if ($_SESSION['admin'] == 1 || $_SESSION['teacher'] == 1 || $_SESSION['student'] == 1)
        $class_member = true;
}

include( $_SERVER['DOCUMENT_ROOT'] . "/localsetup.php");
$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');

// Create connection
$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, 'valiant_11');
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

$sql = "SELECT id, title, content FROM material ORDER BY creation_date DESC LIMIT 10";
$result = mysqli_query($conn, $sql);

echo "<div>";
while ($row = mysqli_fetch_assoc($result)) 
{
    $enjoy = "SELECT count(*) as 'count' FROM enjoy WHERE parent = " . $row['id'];
    $enjoy_count = mysqli_fetch_assoc(mysqli_query($conn, $enjoy));

    echo "
    <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
        <div class='panel panel-primary'>
            <div class='panel-heading'>
                <div class='panel-title panel-left'>
                " .	$row['title'] . "
                </div>
                <div class='enjoy'>
                    <span class='enjoy-count'>";
                
                if ($enjoy_count['count'] > 0)
                    echo $enjoy_count['count'];
                    
                echo "</span>
                    <img class='not-yet' src='/images/enjoy.png'"; 
    
                if ($class_member)
                    echo "onclick='enjoy(this, " . $row['id'] . ", " . $_SESSION['user_id'] . ");'";
                    
                    echo "/>";
                    
        echo "</div>
            </div>
            <div class='panel-body center'>
            " .	$row['content'];

    //get comments and insert them, but only if user is a student, teacher, or admin!
    if ($class_member)
    {
        $comment_query = "SELECT content FROM comment WHERE parent = " . $row['id'];
        $comments = mysqli_query($conn, $comment_query);

        while ($comment = mysqli_fetch_assoc($comments))
            echo "<div class='comment-box'>" . $comment['content'] . "</div>";

        echo "<form method='post' action='comment.php'>
                        <input type='hidden' name='parent' value='" . $row['id'] . "'/>
                        <textarea class='comment' rows='2' name='comment' placeholder='Have a comment?'></textarea>
                        <button class='btn btn-sm btn-default' type='submit'>Submit</button>
                    </form>";
    }

    echo "</div></div></div>";
}
echo "</div>";

$conn->close();

?>

<script type="text/javascript" src="/js/valiant_11.js"></script>

<?php require( $_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>