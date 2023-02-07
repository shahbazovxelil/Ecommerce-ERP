
$(document).ready(function() { 
$(".internal-acts-btn").click(function(){
    $(this).find("i").addClass("text-success");
    $(this).addClass("disabled");
    $(this).parent().prev().prev().find('.select-disabled').attr("disabled", true);;
    let a = $(this).parent().prev().find(".set-time");

    var fromOperator = $(".from-operator-laboratory");
    var fromLaboratory = $(".from-laboratory");
    var receivedLaboratory = $(".received-from-laboratory");
    if($(this).find("i").hasClass("operator-delivery") ){
        fromOperator.removeClass("remove-disabled");
    }

    if($(this).find("i").hasClass("operator-handed-over")){
        fromLaboratory.removeClass("remove-disabled");
    }

    if($(this).find("i").hasClass("from-laboratory-handed")){
        receivedLaboratory.removeClass("remove-disabled");
    }
    
    
    var currentdate = new Date(); 
    var datetime = currentdate.getDate() + "."
                + (currentdate.getMonth()+1)  + "." 
                + currentdate.getFullYear() + " / "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();
    a.html(datetime)
    
})
});