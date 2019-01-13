$('#signup-redirect-ref').click(function() {
    $('.content').hide();
    $('#signup').fadeIn("slow");
});
$('.signin-redirect-ref').click(function() {
    $('.content').hide();
    $('#login').fadeIn("slow");
});
$('#forgotPassword').click(function() {
    $('.content').hide();
    $('#forgot-password').fadeIn("slow");
});
$('#password-reset-submit').click(function(e) {
    e.preventDefault();
    let info = document.getElementById('info');
    info.innerHTML = 'test!';
});