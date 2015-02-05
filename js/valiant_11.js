function updatecontentlabel()
{
    var type = $('#inputType').val();

    if (type == 'youtube' || type == 'picture')
        $('#content').html("URL");
    else if (type == 'text')
        $('#content').html("Content");
}

function enjoy(element, prnt, usr)
{
    $.post('/valiant_11/enjoy.php', { parent: prnt, user: usr }, function (count) {
        $(element).removeClass('enjoy').addClass('enjoyed');
        $(element).siblings('.enjoy-count').html(count);
    });
}