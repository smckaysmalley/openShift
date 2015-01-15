<?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/header.php'); ?>
<div class="col-lg-8 col-lg-offset-2">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <a target="_blank" href="http://nasaprospect.com/">
                    <img src="http://www.awwwards.com/awards/images/2013/06/parallax-scrolling-websites-2013-17.jpg" alt="0">
                </a>
                <div class="carousel-caption">

                </div>
            </div>
            <div class="item">
                <a target="_blank" href="http://www.tedxguc.com/">
                    <img src="http://www.awwwards.com/awards/images/2013/06/parallax-scrolling-websites-2013-10.jpg" alt="1">
                </a>
                <div class="carousel-caption">
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="icon icon-prev" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="icon icon-next" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <?php require( $_SERVER[ 'DOCUMENT_ROOT'] . '/footer.php'); ?>