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
    let $pass = $('#password-input-login');
    if ($pass.attr('type') == 'password') {
        $pass.attr('type', 'text');
        $(this).find($(".far")).removeClass('fa-eye-slash').addClass('fa-eye');
    } else {
        $pass.attr('type', 'password');
        $(this).find($(".far")).removeClass('fa-eye').addClass('fa-eye-slash');
    }
});