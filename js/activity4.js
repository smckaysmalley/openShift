function lookup(element)
{
    $.post('/activity4/lookup.php', { book: $(element).val()}, function (data) {
        console.log(data);
    });
}