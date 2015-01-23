<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/header.php');?>
<?php
    if (isset($_COOKIE["ski_survey"]))
        header("Location: /php_survey/results");
?>
<link href="/css/survey.css" type="text/css" rel="stylesheet">

<div class="jumbotron center">
    <h3>Ski Resort Survey</h3>
    <br/>
    <p>Please take some time to rate the ski resorts below!</p>
</div>
<br/>

<div class="section">
    <div class="resort col-lg-6 col-md-6 col-sm-12 col-xs-12">
       <div class="resort-image" id="targhee" data-50-top="right:0px" data-0-top="right:50%; opacity:0;" data-anchor-target=".section"></div>
    </div>
    <div class="resort col-lg-6 col-md-6 col-sm-12 col-xs-12">
       <div class="resort-image" id="jackson" data-50-top="left:0px" data-0-top="left:50%; opacity:0;" data-anchor-target=".section"></div>
    </div>
</div>

<form action="submit.php" method="POST" onsubmit="return verify();">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title center">
                    Grand Targhee
                </div>
            </div>
            <div class="panel-body survey-gradient">
                <div class="form-group center">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 no-padding">Bad</div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="0" value="1">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="0" value="2">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="0" value="3">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="0" value="4">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="0" value="5">
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 no-padding">Good</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title center">
                    Jackson Hole
                </div>
            </div>
            <div class="panel-body survey-gradient">
                <div class="form-group center">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 no-padding">Bad</div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="1" value="1">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="1" value="2">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="1" value="3">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="1" value="4">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="1" value="5">
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 no-padding">Good</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title center">
                    Kelly Canyon
                </div>
            </div>
            <div class="panel-body survey-gradient">
                <div class="form-group center">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 no-padding">Bad</div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="2" value="1">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="2" value="2">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="2" value="3">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="2" value="4">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="2" value="5">
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 no-padding">Good</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title center">
                    Park City
                </div>
            </div>
            <div class="panel-body survey-gradient">
                <div class="form-group center">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 no-padding">Bad</div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="3" value="1">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="3" value="2">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="3" value="3">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="3" value="4">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="3" value="5">
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 no-padding">Good</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title center">
                    Deer Valley
                </div>
            </div>
            <div class="panel-body survey-gradient">
                <div class="form-group center">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 no-padding">Bad</div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="4" value="1">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="4" value="2">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="4" value="3">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="4" value="4">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="4" value="5">
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 no-padding">Good</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title center">
                    Vail
                </div>
            </div>
            <div class="panel-body survey-gradient">
                <div class="form-group center">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 no-padding">Bad</div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="5" value="1">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="5" value="2">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="5" value="3">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="5" value="4">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <input type="radio" name="5" value="5">
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 no-padding">Good</div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group center">
        <input type="submit" class="btn btn-default" value="Submit">
        <a href="results/" class="btn btn-default">See Results</a>
    </div>
</form>

<script type="text/javascript" src="verify.js"></script>

<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/footer.php'); ?>