$(document).ready(function () {
    $('#submit').on('click', function (e) {

        e.preventDefault();
       
        var email = $('input[name="u_corp_email"]').val();
        var password = $('input[name="u_password"]').val();

        if (email != "" && password != "") {
            $.ajax({
                url: "controller/ajax_login.php",
                type: "POST",
                dataType: "json",
                data: {
                    type: 2,
                    email: email,
                    password: password
                },
                cache: false,
                success: function (dataResult) {


                    if (dataResult.status == 1) {

                        location.href = "index.php";

                    }
                    if (dataResult.status == 0) {

                        $("#error").show();
                        $('#error').html("Email və ya şifrəniz yalnışdır!");
                    }
                    if (dataResult.status == 2) {

                        $("#error").show();
                        $('#error').html("Sizin login statusunuz qeyri aktivdir");
                    }

                }
            });

        } else {

            $("form").addClass("was-validated");
        }
    });

});

var timeout;
document.onmousemove = function(){
  clearTimeout(timeout);
  timeout = setTimeout(function(){alert("move your mouse");}, 120000);
}