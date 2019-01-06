$(document).ready(function() {
    $('#signup-redirect-ref').click(function() {
        $('.content').hide();
        $('#signup').show();
    });
    $('#signin-redirect-ref').click(function() {
        $('.content').hide();
        $('#login').show();
    })
    $('#forgotPassword').click(function() {
        $('.content').hide();
        $('#forgot-password').show();
    })
});