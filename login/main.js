$('a[href="#signup"]').click(function(e) {
    $('.content').hide();
    $('#signup').show();
});

$('a[href="#login"]').click(function(e) {
    $('.content').hide();
    $('#login').show();
});

$('a[href="#forgot-password"]').click(function(e) {
    $('.content').hide();
    $('#forgot-password').show();
});

/* soon to be implemented */
$('#view-pass').click(function(e) {
    e.preventDefault();
    let $pass = $('#password-input-login')

    if ($pass.attr('type') == 'password')
        $pass.attr('type', 'text');
    else
        $pass.attr('type', 'password');

});
/* implement client-side input field validation too ! */