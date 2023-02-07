$(document).ready(function () {

    $(".actived-date").change(function (elem) {
        let current = $(elem.target)[0]
        let parent = ($(current).parents('.select-options'));
        parent.find(".beginner-year").prop('disabled', function (i, v) {
            return !v;
        });
        parent.find(".beginner-month").prop('disabled', function (i, v) {
            return !v;
        });
       
        if(!$(parent).is( ':checked' )){
            parent.find(".beginner-year").val("Select_year").trigger("change");;
            parent.find(".beginner-month").val("Select_month").trigger("change");;
        }
    })



});