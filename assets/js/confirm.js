//Delete samp acts
var deleteItemAction = function () {
    $(".deleteitem").click(function (e) {
        e.preventDefault();
        let href = $(this).attr("href");
        var customer_id = $(this).attr("customer_id");
        $.confirm({
            title: 'Məlumatın silinməsi',
            content: 'Əminsinizmi?',
            closeIcon: true,
            type: 'red',
            buttons: {
                'SİSTEMDƏN SİL': {
                    btnClass: "btn-danger",
                    action: function () {

                    $.ajax({
		            type: "POST",
		            url: "controller/ajax_function.php?tab=delete&customer_id="+customer_id+"",
		            success: function (data) 
                    {
                    if(data == '1'){ window.location.href="sample-acts.php";}
                    console.log(data);
		            }
	                    });//ajax 
                        
                    }
                },
                'ARXİVLƏ': function () {

                    $.ajax({
		            type: "POST",
		            url: "controller/ajax_function.php?tab=archive&customer_id="+customer_id+"",
		            success: function (data) 
                    {
                    if(data == '1'){ window.location.href="sample-acts.php";}
                    console.log(data);
		            }
	                    });//ajax 
                    
                    
                }

            }
        });
    });
}

deleteItemAction();

// window.table.on('draw', function () {
//     deleteItemAction();
// });