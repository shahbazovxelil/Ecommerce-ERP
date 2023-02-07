$(document).ready(function () {


    
    $(".price").keyup(function () {
        calculateAmount();
    })
    $(".quantity").keyup(function () {
        calculateAmount();
    })
    $(".amount").keyup(function () {
        calculateAmount();
    })

    $(".valyute").change(function () {
        calculateAmount();
    })

    // $(document).ready(function () {
    //     $(".m-2, .common-area").keyup(function () {
    //         totalCount();
    //     })
    
    //     $(".size-select").change(function(){
    //         totalCount();
    //     })
    
    // });
    
    // var result = 0;
    // function totalCount(){
    //     let value1 = $(".common-area").val();
    //     let value2 = $(".m-2").val();
    //     let value3 = $(".size-select option:selected").val();
    
    //     if(value3 == "ha"){
    //         result = (value1*value2)*1000;
    //     } else if(value3 == "m²"){
    //         result = (value1*value2);
    //     }
    //     $(".totalAmount").val(result + " AZN");
    // }
    


});



function calculateAmount() {
    var valyute = $(".valyute option:selected").val();
    var quantity = $(".quantity").val();
    var price = $(".price").val();
    var amount = quantity * price;
    amount.toString();
   
    $(".amount").val(amount + " " + valyute);   
}

