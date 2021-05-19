<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Clicking the save button on the open modal for both CREATE and UPDATE
    $('#btn-save').click(function(e) {
        e.preventDefault();
        $(this).html('Sending..');

        $.ajax({
            data: $('#modalFormData').serialize(),
            url: '/admin/products/' +
                $('#productEditorModal')
                .find('input[name="productId"]')
                .val(),
            type: "PUT",
            dataType: 'json',
            success: function(data) {
                $('#modalFormData').trigger("reset");
                $('#productEditorModal').modal('hide');
                table.draw();
            },
            error: function(data) {
                console.log('Error:', data);
                $('#btn-save').html('Save Changes');
            }
        });
    });

</script>
