<?php require( $_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="panel-group" id="accordion">
    <div class="panel panel-inverse">
        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
            <h4 class="panel-title">
                <span class="title-text">
                  Email
                </span> 
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
                <a href="mailto:smckaysmalley@outlook.com">smckaysmalley@outlook.com</a>
            </div>
        </div>
    </div>
    <div class="panel panel-inverse">
        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
            <h4 class="panel-title">
                <span class="title-text">
                  Linked In
                </span>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                <a href="https://www.linkedin.com/in/smckaysmalley" target="_blank">Visit my profile!</a>
            </div>
        </div>
    </div>
    <div class="panel panel-inverse">
        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
            <h4 class="panel-title">
                <span class="title-text">
                  Suggestions
                </span>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
                <form method="post" action="contact/feedback.php">
                    First Name: <input type="text" name="first_name"/><br/><br/>
                    Last Name: <input type="text" name="last_name"/><br/><br/>
                    Suggestion: <br/>
                    <textarea name="feedback" rows="5">This is not working yet...</textarea><br/>
                    <input class="btn btn-default" type="submit" value="Email Me!"/>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="col-lg"div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="center">
        <iframe src="https://onedrive.live.com/embed?cid=2FBC18EAF6E2F93E&resid=2FBC18EAF6E2F93E%2121995&authkey=AAVBHOjtDD76P08" width="320" height="260" frameborder="0" scrolling="no"></iframe>
    </div>
</div>
<?php require( $_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>