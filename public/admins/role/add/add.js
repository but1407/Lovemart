    $(function () {
        $('.checkbox_wrapper').on('click', function () {
            $(this).parents('.card').find('.checkbox_children').prop('checked', $(this).prop('checked'));
        });

        $('.checkall').on('click', function () { 
            $(this).parents().find('.checkbox_wrapper,.checkbox_children').prop('checked',$(this).prop('checked'))
        })

    });

