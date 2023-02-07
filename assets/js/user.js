$('#password, #confirm_password').on('keyup', function () {
    if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html('').css('color', 'green');
        $('.form-control:valid').css('border-color', 'green');
    } else
        $('#message').html('Təkrar şifrəni düzgün daxil edin').css('color', 'red');
    $('#feedback-user').css('display', 'none')
    $('.form-control:invalid').css('border-color', 'red');
    $('.form-control:invalid').css('background-image', 'none');
    $('.form-control:valid').css('border-color', '#e6ebf1');
});