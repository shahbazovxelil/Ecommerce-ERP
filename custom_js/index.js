$( document ).ready(function() {

    $(document).on("click","#logout",function(){
        $.ajax({
            url: "controller/ajax_login.php?tab=logout",
            type: "POST",
            dataType: "json",
            success: function (data) {
                if(data.status == 1) window.location.href="login.php";
            }
        });
    });

});
