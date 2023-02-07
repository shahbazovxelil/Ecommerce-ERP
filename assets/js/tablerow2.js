
var tableRowNumber = 0

$(document).ready(function () {
    
    $(document).on("click", ".click_btnn", function () {

        tableRowNumber = $(this).parent().parent().parent().parent().parent().find("tr").length -3;
        tableRowNumber += 1;
        $('tbody').append(`<tr class="append">
            <td class="align-middle border-bottom-0 w-5 text-center">${tableRowNumber}</td>
            <td class="align-middle">
                <div class="col-lg-12">                                                                       
                        <div class="form-group m-0">
                            <div>
                                <input type="text"
                                    class="form-control"
                                    name="name1[]"
                                    value="">
                            </div>
                        </div>
                
                </div>
            </td>

            
        </tr>`);

        
    });

});