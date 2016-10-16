$('.delete-button').on('click', function () {
    $('#delete-form').attr('action', $(this).data('delete-link'));
});