function verify()
{
    var finished = $('input:radio:checked').length == ($('input:radio').length / 5);
    if (!finished)
        alert("Please vote on all resorts");
    return finished;
}
