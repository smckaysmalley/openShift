function verify()
{
    return ($('input:radio:checked').length == ($('input:radio').length / 5));
}
