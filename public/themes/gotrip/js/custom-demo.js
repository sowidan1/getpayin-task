// fetch demo user
$('#admin-user-demo').click(function() {
    $('#loginForm input[name=email]').val('admin@example.com');
    $('#loginForm input[name=password]').val('12345678');
    $('#loginForm input[name=password]').attr('type', 'text');
    if ($(window).width() <= 1199) {
        $('html, body').animate({
            scrollTop: $('#loginForm').offset().top
        }, 100); 
    }
});
$('#vendor-user-demo').click(function() {
    $('#loginForm input[name=email]').val('vendor@example.com');
    $('#loginForm input[name=password]').val('12345678');
    $('#loginForm input[name=password]').attr('type', 'text');
    if ($(window).width() <= 1199) {
        $('html, body').animate({
            scrollTop: $('#loginForm').offset().top
        }, 100); 
    }
});