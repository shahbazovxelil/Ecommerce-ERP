    //Delete samp acts
    let deleteItemAction = function () {
        $(".deleteitem").click(function (e) {
            e.preventDefault();
            let href = $(this).attr("href");
            $.confirm({
                title: 'Məlumatın silinməsi',
                content: 'Əminsinizmi?',
                closeIcon: true,
                buttons: {
                    'SİL': {
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
    }

    deleteItemAction();

    window.table.on('draw', function () {
        deleteItemAction();
    });