/**
 * Created by samhv on 10/16/16.
 */
$(document).ready(function () {
    var idToDelete = 0;
   $(document).on("click", ".trigger-delete-modal", function () {
       idToDelete = $(this).data('user-id');
       //console.log(idToDelete);
       $('#confirmDeleteModal').modal();
   });

    $(document).on("click", "#accept-delete-button", function () {
        console.log(idToDelete);
    });
});