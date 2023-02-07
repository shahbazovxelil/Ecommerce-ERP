$(document).ready(function () {

    //Delete users
    $(".deleteuser").click(function (e) {
        e.preventDefault();
        let href = $(this).attr("href");
        $.confirm({
            title: '<span class="#000">İstifadəçinin silinməsi</span>',
            content: 'Əminsinizmi?',
            closeIcon: true,
            buttons: {
                'Sil': {
                    btnClass: "btn-danger",
                    action: function () {
                        location.href = href;
                    }
                },
                'Bağla': function () {

                }

            }
        });
    });

    $(".quarantine-input").change(function (elem) {
        let current = $(elem.target)[0]
        let parent = ($(current).parents('.item-content'));
        parent.find(".non-quarantine-selected").click();
        parent.toggleClass("border-red");
        parent.find(".quarantine-added").toggleClass("quarantine-add");
        parent.find(".quarantine-img-added").toggleClass("quarantine-img");
        parent.find(".quarantine-group").prop('disabled', false);
        parent.find(".insects").prop('disabled', false);
        parent.find(".bacteria").prop('disabled', false);
        parent.find(".mushrooms").prop('disabled', false);
        parent.find(".microplasma-virus").prop('disabled', false);
        parent.find(".weeds-and-parasitic-plants").prop('disabled', false);
        $(current).toggleClass("quarantine-selected");
    })

    $(".nonQuarantine-input").change(function (elem) {
        let current = $(elem.target)[0];
        let parent = ($(current).parents('.item-content'));
        parent.find(".quarantine-selected").click();
        parent.toggleClass("border-green");
        parent.find(".non-quarantine-added").toggleClass("non-quarantine-add");
        parent.find(".non-quarantine-img-added").toggleClass("non-quarantine-img");
        parent.find(".quarantine-group").prop('disabled', true);
        parent.find(".insects").prop('disabled', true);
        parent.find(".bacteria").prop('disabled', true);
        parent.find(".mushrooms").prop('disabled', true);
        parent.find(".microplasma-virus").prop('disabled', true);
        parent.find(".weeds-and-parasitic-plants").prop('disabled', true);
        $(current).toggleClass("non-quarantine-selected");

    })


});

