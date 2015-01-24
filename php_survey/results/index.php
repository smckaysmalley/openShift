<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/header.php'); $resorts=explode( '|', file_get_contents( '../results.txt')); $gt=explode( '->', $resorts[0]); $jh=explode( '->', $resorts[1]); $kc=explode( '->', $resorts[2]); $pc=explode( '->', $resorts[3]); $dv=explode( '->', $resorts[4]); $va=explode( '->', $resorts[5]); ?>
<link rel="stylesheet" type="text/css" href="/css/survey.css">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <img class="resort-image fly-in-left" src="http://cdn.jacksonholenet.com/images/content/14562_792_Grand_Targhee_md.jpg">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title center">
                Grand Targhee
            </div>
        </div>
        <div class="panel-body">
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:<?php echo floor($gt[0] / 5 * 100).'%'; ?>">
                    <?php echo number_format($gt[0], 2) . ' / 5'; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <img class="resort-image fly-in-right" src="http://cdn.jacksonholenet.com/images/content/18441_1633_Teton_Village_Jackson_Hole_WY_Tram_md.jpg">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title center">
                Jackson Hole
            </div>
        </div>
        <div class="panel-body">
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:<?php echo floor($jh[0] / 5 * 100).'%'; ?>">
                    <?php echo number_format($jh[0], 2) . ' / 5'; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <img class="resort-image fly-in-right" src="http://www.skikelly.com/uploads/1-17-15%209.jpg">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title center">
                Kelly Canyon
            </div>
        </div>
        <div class="panel-body">
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:<?php echo floor($kc[0] / 5 * 100).'%'; ?>">
                    <?php echo number_format($kc[0], 2) . ' / 5'; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <img class="resort-image fly-in-left" src="http://cdn.allparkcity.com/images/content/5020_14553_Park_City_Ski_Resort_md.jpg">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title center">
                Park City
            </div>
        </div>
        <div class="panel-body">
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="min-wiwidth: 2em; width:<?php echo floor($pc[0] / 5 * 100).'%'; ?>">
                    <?php echo number_format($pc[0], 2) . ' / 5'; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <img class="resort-image fly-in-left" src="http://skiresortadvisor.com/uploads/resort-tremblant-v08160614.jpg">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title center">
                Deer Valley
            </div>
        </div>
        <div class="panel-body">
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:<?php echo floor($dv[0] / 5 * 100).'%'; ?>">
                    <?php echo number_format($dv[0], 2) . ' / 5'; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <img class="resort-image fly-in-right" src="http://cdn.allvail.com/images/content/6358_6525_Vail_Resort_md.jpg">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title center">
                Vail
            </div>
        </div>
        <div class="panel-body">
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:<?php echo floor($va[0] / 5 * 100).'%'; ?>">
                    <?php echo number_format($va[0], 2) . ' / 5'; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    if (!isset($_COOKIE[ 'ski_survey'])) 
        echo '<div class="row center"><a class="center btn btn-default" href="../">Take Survey!</a></div><br/>'; 
?>

<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/footer.php'); ?>