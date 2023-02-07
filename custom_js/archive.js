$(document).ready(function () {

    $(document).on("click",".restore",function(){
        let doc_id = $(this).parents("td").attr('doc_id');
        let doc_id2 = $(this).parents("tr");
        $(document).off("click",".restore2").on("click",".restore2",function(){

            // var xx =$(this).parent().parent();
            
            $.ajax({
                url: "controller/add-new-document.php?case=restore",
                type: "POST",
                dataType: "json",
                data:{doc_id:doc_id},
                success: function (data) {
                    if(data.status==1){
                        doc_id2.remove();
                        $('.redoModal').modal('hide');
                        not1();                    }
                    else {
                        not11();
                    }

                }
            });
            
            });
        });


});