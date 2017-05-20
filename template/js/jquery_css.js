$(document).ready(function() {
// Handler for .ready() called.
$(".gora").click(function() {
var cssObj = {
'background-color' : '#ddd',
'-moz-border-radius' : '7px',
'border-radius' : '7px',
'text-shadow' : '1px 1px 1px #fff',
'margin-top' : '5px',
'margin-bottom': '5px',
'padding' : '8px 5px',
'-webkit-border-radius' : '5px'
};
$(this).css(cssObj);
});
});
