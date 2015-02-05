var flewIn;
var flyDistance;

/******************************************************************************
 * WINDOW LOAD EVENT
 *
 * ***************************************************************************/
$(window).load(function()
{
    //check fly in animation on scroll
    if (!flewIn) checkFlightStatus();
});

/******************************************************************************
 * SCROLL EVENT
 *
 * ***************************************************************************/
$(document).scroll(function()
{
    //check fly in animation on scroll
    if (!flewIn) checkFlightStatus();
});

/******************************************************************************
 * WINDOW RESIZE EVENT
 *
 * ***************************************************************************/
$(window).resize(function()
{
    //check fly in animation on scroll
    if (!flewIn) checkFlightStatus();
});

/******************************************************************************
 * DOCUMENT READY EVENT
 *
 *  - moves fly-in elements off screen to be animated
 * ***************************************************************************/
$(document).ready(function()
{
    if("undefined"==typeof jQuery)
        throw new Error("Fly-in JavaScript requires jQuery");
    else {
        flewIn = false;
        flyDistance = -($('#main').width());
        var flyerRight = document.getElementsByClassName('fly-in-right');
        var flyerLeft = document.getElementsByClassName('fly-in-left');

        //positions offscreen to the left for flying right
        for (var i = 0; i < flyerRight.length; i++)
        {
            flyerRight[i].style.visibility = 'hidden';
            flyerRight[i].style.position = 'relative';
            flyerRight[i].style.right = flyDistance+'px';
            flyerRight[i].style.opacity = 0;
        }

        //positions offscreen to the right for flying left
        for (i = 0; i < flyerLeft.length; i++)
        {
            flyerLeft[i].style.visibility = 'hidden';
            flyerLeft[i].style.position = 'relative';
            flyerLeft[i].style.left = flyDistance+'px';
            flyerLeft[i].style.opacity = 0;
        }

        //sets the overflow for offscreen elements
        $('#main').css('overflow', 'hidden');
    }
});

/******************************************************************************
 * CHECK FLIGHT STATUS
 *
 *  - created to avoid needless redundancy amongst different events
 *  - checks to see if fly-in animation has already occured
 * ***************************************************************************/
function checkFlightStatus()
 {
    //gets array for each fly-in elements
    var flyerRight = document.getElementsByClassName('fly-in-right');
    var flyerLeft = document.getElementsByClassName('fly-in-left');

    //flying right animation
    for(var i = 0; i < flyerRight.length; i++)
    {
        if (isVisible(flyerRight[i]) && flyerRight[i].style.visibility == 'hidden')
        {
            flyerRight[i].style.visibility = 'visible';
            flyIn(flyerRight[i], flyDistance);
        }
    }

    //flying left animation
    for(i = 0; i < flyerLeft.length; i++)
    {
        if (isVisible(flyerLeft[i]) && flyerLeft[i].style.visibility == 'hidden')
        {
            flyerLeft[i].style.visibility = 'visible';
            flyIn(flyerLeft[i], -flyDistance);
        }
    }

    //test to see if all the visible elements have flown in
    if (isVisible(bottomFlyer()))
    {
        flewIn = true;

        //set all other fly-in elements to visible and to their correct location
        for(i = 0; i < flyerRight.length; i++)
        {
            if (flyerRight[i].style.visibility != 'visible')
            {
                flyerRight[i].style.visibility = 'visible';
                flyerRight[i].style.right = '0px';
                flyerRight[i].style.opacity = 1;
            }
        }

        //set all other fly-in elements to visible and to their correct location
        for(i = 0; i < flyerLeft.length; i++)
        {
            if (flyerLeft[i].style.visibility != 'visible')
            {
                flyerLeft[i].style.visibility = 'visible';
                flyerLeft[i].style.left = '0px';
                flyerLeft[i].style.opacity = 1;
            }
        }
    }
 }

/******************************************************************************
 * IS VISIBLE
 *
 *  - returns if the element (e) is completely visible or not
 *  - ONLY WORKS VERTICALLY!
 * ***************************************************************************/
 function isVisible(e)
 {
    if (e === null)
    {
        return true;
    }

    var windowTop = $(window).scrollTop();
    var windowBottom = windowTop + $(window).height();
    var eTop = $(e).offset().top;
    var eBottom = eTop + e.offsetHeight;

    if (windowTop < eTop && eTop < windowBottom &&
        windowTop < eBottom && eBottom < windowBottom)
        return true;
    else
        return false;
 }

/******************************************************************************
 * BOTTOM FLYER
 *
 *  - returns the lowest element on the page that is part of either fly-in-left
 *    or fly-in-right classes
 * ***************************************************************************/
function bottomFlyer()
{
    var flyer = Array.prototype.slice.call(document.getElementsByClassName("fly-in-right")).concat(
        Array.prototype.slice.call(document.getElementsByClassName("fly-in-left")));

    var lowest = flyer[0];
    for (var i = 1; i < flyer.length; i++)
    {
        if (flyer[i].offsetHeight > 0 && (($(flyer[i]).offset().top+flyer[i].offsetHeight) > ($(lowest).offset().top+lowest.offsetHeight)))
        {
            lowest = flyer[i];
        }
    }

    if (lowest.offsetHeight <= 0)
        return null;

    else
        return lowest;
}

/******************************************************************************
 * FLY IN
 *
 * - animates an element across the x axis
 * ***************************************************************************/
function flyIn(e, flyDistance)
{
    e.style.transition = "all 0.5s ease-out";
    e.style.WebkitTransition = "all 0.5s ease-out";
    e.style.OTransition = "all 0.5s ease-out";
    e.style.msTransition = "all 0.5s ease-out";
    e.style.MozTransition = "all 0.5s ease-out";

    e.style.transform = "translateX("+flyDistance+"px)";
    e.style.WebkitTransform = "translateX("+flyDistance+"px)";
    e.style.OTransform = "translateX("+flyDistance+"px)";
    e.style.msTransform = "translateX("+flyDistance+"px)";
    e.style.MozTransform = "translateX("+flyDistance+"px)";

    e.style.opacity = 1;
}