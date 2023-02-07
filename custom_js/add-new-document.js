$(document).ready(function () {

    $(document).on("submit", ".form", function (e) {
        e.preventDefault();
        var buttonSubmit = $(this).find('button[type="submit"]');
        var fd = new FormData();
        if ($('input[name="document_file"]')[0].files[0] !== undefined) fd.append('document_file', $('input[name="document_file"]')[0].files[0]);
        fd.append("form_data",$(".form").serialize());

        $.ajax({
            contentType: false,
            processData: false,
            url: "controller/add-new-document.php?case=add_document",
            type: "POST",
            dataType: "json",
            data: fd,
            beforeSend: function() {
                // setting a timeout
                buttonSubmit.addClass('btn-loaders disabled');
            },
            success: function (data) {
                if(data.status == 1){
                    not1();
                    setTimeout(function(){
                        window.location.href = "document.php";
                    },1000);
                    
                }else{
                    not11();
                    
                }
            }
        });


    });




});