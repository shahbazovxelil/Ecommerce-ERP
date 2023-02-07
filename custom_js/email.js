$(document).ready(function () {

    $(document).on("submit", "#form_mail", function (e) {
        e.preventDefault();
       
        $.ajax({
            url: "controller/users-list.php?case=add_email",
            type: "POST",
            dataType: "json",
            data: $("#form_mail").serialize(),
            success: function (data) {
                if(data.status == 1){
                    not1();
                    $("#gmailModal").modal('hide');
                }else{
                    not11();
                }
            }
        });


    });




});