$(document).ready(function() {
    $('#signup-redirect-ref').click(function() {
        $('.content').hide();
        $('#signup').fadeIn("slow");
    });
    $('#signin-redirect-ref').click(function() {
        $('.content').hide();
        $('#login').fadeIn("slow");
    });
    $('#forgotPassword').click(function() {
        $('.content').hide();
        $('#forgot-password').fadeIn("slow");
    });
});