
$(document).ready(function() {

    //add user
    $(".user_create").on("submit",function(e)
    {
        e.preventDefault();
        let buttonSubmit = $(this).find('button[type="submit"]');
        var options =  document.getElementById('u_company').selectedOptions;
        var values =  Array.from(options).map(({ value }) => value);
        var fd = new FormData();
        var user_info = $(".user_create").serialize();
        fd.append("not_to_whom",values);
        if($('input[name="u_profile_img"]')[0].files[0] !== undefined)fd.append('u_profile_img',$('input[name="u_profile_img"]')[0].files[0]);
        fd.append('user_info', user_info);
        var data=$("#u_company").serialize();
        if(document.querySelector("#form_id").checkValidity()){
            $.ajax({
                contentType: false,
                processData: false,
                dataType:'json',
                url: "controller/ajax_user.php?tab=add_user",
                type: 'POST', 
                data:fd,
                beforeSend: function() {
                    buttonSubmit.addClass('btn-loaders disabled');
                },
                success: function(response)
                {         
                    if(response.status){
                        not1();
                        setTimeout(function(){
                            window.location.href = "users-list.php";
                        },1500);
                        
                    }else{
                        not11();
                    }
                }
            });
        }
    });
  


    //edit user
    $(".user_edit").on("submit",function(e)
    {
        e.preventDefault();
        let buttonSubmit = $(this).find('button[type="submit"]');
        var options     =   document.getElementById('u_company').selectedOptions;
        var values      =   Array.from(options).map(({ value }) => value);
        if(document.querySelector(".user_edit").checkValidity()){
            var fd = new FormData();
            var user_info = $(".user_edit").serialize();
            fd.append("not_to_whom",values);
            if($('input[name="u_profile_img"]')[0].files[0] !== undefined)fd.append('u_profile_img',$('input[name="u_profile_img"]')[0].files[0]);
            fd.append('user_info', user_info);

            const urlParams = new URLSearchParams(window.location.search);
            const param_x = urlParams.get('id');
        
            $.ajax({
                contentType: false,
                processData: false,
                dataType:'json',
                url: "controller/ajax_user.php?tab=edit_user&uid="+param_x+"",
                type: 'POST', 
                data:fd,
                beforeSend: function() {
                    buttonSubmit.addClass('btn-loaders disabled');
                },
                success: function(response)
                {    
                    if(response.status){
                        not1();
                        setTimeout(function(){
                            window.location.href = "users-list.php";
                        },1500);
                    }else{
                        not11();
                    }

                }

            });
        }
    });
});

