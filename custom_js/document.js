$( document ).ready(function() {

    $(document).on("click",".note",function(){

        let doc_id = $(this).parents("td").attr('doc_id');
        let thiss = $(this).parents("td");
        
         $(document).off("click","#save_btn_note").on("click","#save_btn_note",function(){
            let note = $("input[name='note']").val();
            $.ajax({
                url: "controller/add-new-document.php?case=add_note",
                type: "POST",
                dataType: "json",
                data:{note:note,doc_id:doc_id},
                success: function (data) {
                    if(data.status == 1)
                    {
                       not1();
                       $(".noteModal").modal("hide");
                       thiss.prev().find(".spannote").html(data.note);
                         $("input[name='note']").val("");
                       
                    }  
                    else
                    {
                        not11();  
                    }
                    
                }
            });
         });


        
    });

    $(document).on("click",".see",function(){

        let doc_id = $(this).parents("td").attr('doc_id');
        let thiss = $(this).parents("td");
        
            $.ajax({
                url: "controller/add-new-document.php?case=user_list_see",
                type: "POST",
                dataType: "json",
                data:{doc_id:doc_id},
                success: function (data) {

                    let ids = JSON.parse(data.doc.see_status)[0];
                    let seedate = JSON.parse(data.doc.see_status)[1];
                    
                    
                    $("#see").empty();
                    $.each(data.users_list, function(i,item){
                        index = ids.indexOf(item.id.toString());
                        if(data.my_id == item.id) disabled = "see_btn"; else disabled = "disabled";
                        if(index != -1)
                        {
                            btn = 'btn-success';
                            dsbld = "disabled";
                            s_date = seedate[index];
                            see = '<span class="badge bg-success rounded-pill">Tanış olub</span>';
                        } 
                         else 
                         {
                             btn = 'btn-dark';
                             dsbld = "";
                             s_date = '';
                             see = '<span class="badge bg-danger rounded-pill">Tanış olmayıb</span>';
                         }
                        num = i+1;
                        $("#see").append(`
                        <tr>
                            <td>${num}</td>
                            <td>${item.u_name} ${item.u_surname}</td>
                            <td>
                                <span>${s_date}</span>
                            </td>
                            <td class="text-center">
                                
                                ${see}
                            
                            <td class="d-flex justify-content-center">
                                <a class="btn ${btn} text-white btn-circle btn-sm ${disabled} ${dsbld}" title="Tanış ol">
                                    <i class="fe fe-check"></i>
                                </a>
                            </td>
                        </tr>
                        `);		
                    });	

                    $(".tablesee").dataTable();
                }
            });

            $(document).off("click",".see_btn").on("click",".see_btn",function(){
                $.ajax({
                    url: "controller/add-new-document.php?case=user_see_confirm",
                    type: "POST",
                    dataType: "json",
                    data:{doc_id:doc_id},
                    success: function (data) {
                        if(data.status == 1)
                        {
                            $(".seeModal").modal("hide");
                            not1();
                            setTimeout(function(){
                                window.location.href = "document.php";
                            }, 1000);
                            
                        }else{
                            not11();
                        }

                    }
                });
                
            });
        
    });









    $(document).on("click",".confirm",function(){

        let doc_id = $(this).parents("td").attr('doc_id');
        let thiss = $(this).parents("td");
        
            $.ajax({
                url: "controller/add-new-document.php?case=user_list_confirm",
                type: "POST",
                dataType: "json",
                data:{doc_id:doc_id},
                success: function (data) {
                    let ids = JSON.parse(data.doc.confirmation_id)[0];
                    let c_date = JSON.parse(data.doc.confirmation_id)[1];
                    let c_status = JSON.parse(data.doc.confirmation_id)[2];
                    let comment = JSON.parse(data.doc.confirmation_id)[3];
                    
                    $("#confirm_tbody").empty();
                    $.each(data.users_list, function(i,item){
                        indexx = ids.indexOf(item.id.toString());
                        if(data.my_id == item.id) disabled = ""; else disabled = "disabled";
                        if(indexx != -1)
                        {
                            if(c_status[indexx] == 1) cnf_sts = '<span class="badge bg-success rounded-pill">Təsdiqlənib</span>';
                            else if(c_status[indexx] == 0) cnf_sts = '<span class="badge bg-danger rounded-pill">Rədd edilib</span>';
                            s_date = c_date[indexx];
                            dsbld = "disabled";
                            

                        } 
                         else 
                         {
                            cnf_sts = '<span class="badge bg-warning rounded-pill">Gözləmə</span>';
                            s_date = "";
                            dsbld = "";

                         }
                        num = i+1;


                        if(comment[indexx]==undefined){comment[indexx]="";}
                        $("#confirm_tbody").append(`
                        <tr>
                            <td>${num}</td>
                            <td>${item.u_name} ${item.u_surname}</td>
                            <td>
                                <span>${s_date}</span>
                            </td>
                            <td class="text-center">
                                
                                ${cnf_sts}
                            </td>
                            <td class=" fs-11">
                                
                              ${comment[indexx]}
                            </td>
                            <td class="d-flex justify-content-center">
                            
                                <a class="btn btn-success text-white btn-circle btn-sm  ms-2 ${disabled} ${dsbld}" data-bs-toggle="modal" data-bs-target=".confirmationModal" title="Təsdiqlə">
                                    <i class="fe fe-check"></i>
                                </a>
                                <a class="btn btn-danger text-white btn-circle btn-sm  ms-2 ${disabled} ${dsbld}" data-bs-toggle="modal" data-bs-target=".cancelModal" title="İnkar Edin">
                                    <i class="fe fe-check"></i>
                                </a>
                            </td>
                        </tr>
                        `);		
                    });	

                    $(".tableconfirm").dataTable();
                }
            });

            // <a class="btn btn-success text-white btn-circle btn-sm confirm_btn ${disabled} ${dsbld}" title="Təsdiqlə"> 
            //     <i class="fe fe-check"></i>
            // </a> 
            // CEMIL BU SENIN KOHNE YAZDIGIN TESDIQLEDIR







            $(document).off("click",".confirm_btn").on("click",".confirm_btn",function(){
                $.ajax({
                    url: "controller/add-new-document.php?case=user_confirm_confirm",
                    type: "POST",
                    dataType: "json",
                    data:{doc_id:doc_id},
                    success: function (data) {
                        if(data.status == 1)
                        {
                            $(".submitModal").modal("hide");
                            not1();
                        }else{
                            not11();
                        }

                    }
                });
                
            });


///////////////////////////////

            $(document).off("click",".confirmation_cancel_btn").on("click",".confirmation_cancel_btn",function(){
                $.ajax({
                    url: "controller/add-new-document.php?case=user_confirm_cancel",
                    type: "POST",
                    dataType: "json",
                    data:{doc_id:doc_id,confirmation_cancel_note:$("input[name='confirmation_cancel_note']").val(),
                    hid_user_id:$("input[name='hid_user_id']").val()},
                    success: function (data) {
                        if(data.status == 1)
                        {
                            $(".submitModal").modal("hide");
                            $(".cancelModal").modal("hide");
                            not1();
                        }

                    }
                });
                
            });


            $(document).off("click",".confirmation_ok_btn").on("click",".confirmation_ok_btn",function(){
                $.ajax({
                    url: "controller/add-new-document.php?case=user_confirm_ok",
                    type: "POST",
                    dataType: "json",
                    data:{doc_id:doc_id,confirmation_ok_note:$("input[name='confirmation_ok_note']").val(),
                    hid_user_ok_id:$("input[name='hid_user_ok_id']").val()},
                    success: function (data) {
                        if(data.status == 1)
                        {
                            $(".confirmationModal").modal("hide");
                            $(".submitModal").modal("hide");
                            $(".cancelModal").modal("hide");
                            not1();
                        }

                    }
                });
                
            });
        

        
    });
        



//tesdiqq






/////////////////////////////////////////

    $(document).on("click",".uploadd",function(){

        let doc_id = $(this).parents("td").attr('doc_id');
        let thiss = $(this).parents("td");
        
         $(document).off("click",".upload_modal_btn").on("click",".upload_modal_btn",function(){
             console.log('sdsfds');
            var fdd = new FormData();
            if ($('input[name="upload_modal_file"]')[0].files[0] !== undefined) fdd.append('file', $('input[name="upload_modal_file"]')[0].files[0]);
            fdd.append('note',$('input[name="upload_modal_note"]').val());
            fdd.append('doc_id',doc_id);
            $.ajax({
                contentType: false,
                processData: false,
                url: "controller/add-new-document.php?case=add_file",
                type: "POST",
                dataType: "json",
                data:fdd,
                success: function (data) {
                    
                    if(data.status == 1)
                    {
                       not1();
                       $(".uploadModal").modal("hide");
                       
                       
                    }  
                    else
                    {
                        not11();  
                    }
                    
                }
            });
         });


        
    });

    $(document).on("click",".see_upload",function(){

        let doc_id = $(this).parents("td").attr('doc_id');
        
            $.ajax({
                url: "controller/add-new-document.php?case=upload_see",
                type: "POST",
                dataType: "json",
                data:{doc_id:doc_id},
                success: function (data) {
                    
                    $("#upload_see_tbody").empty();
                    $.each(data.result, function(i,item){

                        num = i+1;
                        $("#upload_see_tbody").append(`
                            <tr>
                                <td>${num}</td>
                                <td>${item.u_name} ${item.u_surname}</td>
                                <td>
                                    <span>${item.c_date}</span>
                                </td>
                                <td class="text-center">
                                ${item.note}
                                </td>
                                
                                <td class="d-flex justify-content-center">
                                    <a  href="controller/${item.file_url}" download class="btn btn-primary btn-circle btn-sm me-1" title="Sənədi yüklə">
                                        <i class="fe fe-download"></i>
                                    </a>
                                </td>
                            </tr>
                        `);		
                    });	

                    $(".table_upload").dataTable();
                }
            });
        
    });





});
