$(document).ready(function () {
    const params = new URLSearchParams(window.location.search);
  
    $(document).on("submit", "#form_id", function (e) {
        e.preventDefault();
        let buttonSubmit = $(this).find('button[type="submit"]');
        $.ajax({
            url: "controller/add-new-authority.php?case=add",
            type: "POST",
            dataType: "json",
            data: $("#form_id").serialize(),
            beforeSend: function() {
                // setting a timeout
                buttonSubmit.addClass('btn-loaders disabled');
            },
            success: function (data) {
                if(data.status == 1){
                    not1();
                    setTimeout(function(){
                        window.location.href="1c-authority.php";
                    },1500);
                   
                
                }else{
                    not11();
                }
            }
        });


    });


    $(document).on("submit", "#form_edit", function (e) {
        e.preventDefault();
        let buttonSubmit = $(this).find('button[type="submit"]');
        $.ajax({
            url: "controller/add-new-authority.php?case=edit&uid="+params.get('uid'),
            type: "POST",
            dataType: "json",
            data: $("#form_edit").serialize(),
            beforeSend: function() {
                // setting a timeout
                buttonSubmit.addClass('btn-loaders disabled');
            },
            success: function (data) {
                if(data.status == 1){
                    not1();
                    setTimeout(function(){
                        window.location.href="1c-authority.php";
                    },1500);
                
                }else{
                    not11();
                }
            }
        });


    });


    $(document).on("click", ".ttt", function () {
        
       let id = $(this).attr("id");
        $.ajax({
            url: "controller/add-new-authority.php?case=T&uid="+id,
            type: "POST",
            dataType: "json",
            success: function (data) {
                if(data.status == 1){
                    not1();
                    setTimeout(function(){
                        window.location.href="1c-authority.php";
                    },1500);
                }else{
                    not11();
                }
            }
        });


    });




});