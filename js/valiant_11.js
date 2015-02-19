function updatecontentlabel() {
    var type = $('#inputType').val();

    if (type == 'youtube' || type == 'picture')
        $('#content').html("URL");
    else if (type == 'text')
        $('#content').html("Content");
}

function enjoy(element, prnt, usr) {
    $.post('/valiant_11/enjoy.php', {
        parent: prnt,
        user: usr
    }, function (count) {
        $(element).removeClass('no-enjoy').addClass('enjoy');
        $(element).siblings('.enjoy-count').html(count);
        $(element).removeAttr('onclick');
    });
}

function archive(element, item) {
    $.post('/valiant_11/toggle_material.php', {
        id: item
    }, function (display) {
        var panel = $(element).parent().parent().parent();
        if (display == '1') {
            $(panel).removeClass('archived');
            $(element).removeClass('label-danger').addClass('label-success').html('Active');
        } else {
            $(panel).addClass('archived');
            $(element).removeClass('label-success').addClass('label-danger').html('Archived');
        }
    });
}

function comment(element, prnt, usr) {

    var comment_box = $(element).siblings('textarea[name="comment"]');
    var comment = $(comment_box).val();
    var cnt = $(element).siblings(".comments").children('.comment-box').length;
    $(comment_box).val("");

    $.post('/valiant_11/comment.php', {
        parent: prnt,
        user: usr,
        comment: comment,
        count: cnt
    }, function (response) {
        var commentbox = $(element).siblings('.comments');
        var new_comment = $(response).hide();
        $(commentbox).append(new_comment);
        $(new_comment).show('slow');
        
        
        
    });
}