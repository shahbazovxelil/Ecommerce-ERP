var tableRowNumber = 0;
$(document).ready(function () {
    $('#add-new-row').click(function(){
       
        tableRowNumber = $(this).parent().next().find('tr').length-1;
        tableRowNumber += 1;
        
       $('tbody').append(`<tr>
                <td class="align-middle text-center">
                ${tableRowNumber}
                </td>
                <td class="align-middle">
                    <div class="col-lg-12">                                                                       
                            <div class="form-group m-0">
                                <div>
                                    <input type="text" name="name[]"
                                        class="form-control"
                                        value="">
                                </div>
                            </div>
                      
                    </div>
                </td>
            </tr>`);


    });

    $('.add-new-row').click(function () {
        $('#add-new-row').click();
    });


});
