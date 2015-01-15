var string = "";
$(document).keydown(function (keystroke) {
    if (keystroke.which == '48') {
        string = "";
    } 
    else {
        string += keystroke.which;
        console.log(string);
    }

    if (string == '70767380') {
        startFlip($('body'));
        string = "";
    }
    if (string == '8065786976')
    {
        startFlip($('.panel'));
        string = "";
    }
    if (string == '807367')
    {
        startFlip($('iframe'));
        startFlip($('img'));
        string = "";
    }
    if (string == '668478')
    {
        startFlip($('.btn'));
        string = "";
    }
    if (string == '657676')
    {
        startFlip($('.btn'));
        startFlip($('iframe'));
        startFlip($('img'));
        startFlip($('.panel'));
        startFlip($('body'));
        startFlip($('p'));
        string = "";
    }
});

function startFlip(element)
{
    console.log("flipping...");
    $(element).addClass("flipper");
    setTimeout(function() {stopFlip(element)}, 2000);
}

function stopFlip(element)
{
    $(element).removeClass("flipper");
    console.log("done flipping...");
}