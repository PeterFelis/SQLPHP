const val = "peter";
$('div').first().html("<h2>" + val + "</h2>");

$('div').last().html('burp');


$('div').click((e) => {
    $(e.target).html('clicked');
})