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
        console.log("flipping...");
        startFlip();
        setTimeout(function() {stopFlip()}, 2000);
        string = "";
    }
});

function startFlip()
{
    $("#body").addClass("flipper");
}

function stopFlip()
{
    $("#body").removeClass("flipper");
    console.log("done flipping...");
}