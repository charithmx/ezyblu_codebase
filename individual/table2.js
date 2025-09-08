// table.js
$(document).ready(function () {
    // Make an AJAX request to fetch data from the server


	
	// Handle modal display when button is clicked
    $('#detailsTableBody').on('click', 'a.detailsButtonEdit', function () {
        var id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: 'common/get_details_edit.php',
            data: { id: id },
            success: function (response) {
                $('.modal-body').html(response);
                $('#modal_edit_type_2').modal('show');
            },
            error: function () {
                alert('Error fetching details.');
            }
        });
    });
	
	 $('#detailsTableBody').on('click', 'a.detailsButtonDelete', function () {
        var id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: 'common/get_details_delete.php',
            data: { id: id },
            success: function (response) {
                $('.modal-body').html(response);
                $('#modal_delete_type_2').modal('show');
            },
            error: function () {
                alert('Error fetching details.');
            }
        });
    });
	
});