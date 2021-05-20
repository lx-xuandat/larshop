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

        var url = '/admin/products/';
        var type = 'POST';
        if ($(this).val() == 'update') {
            type = 'PUT';
            url += $('#productEditorModal').find('input[name="productId"]').val();
        }

        $.ajax({
            data: $('#modalFormData').serialize(),
            url: url,
            type: type,
            dataType: 'json',
            success: function(data) {
                $('#modalFormData').trigger("reset");
                $('#productEditorModal').modal('hide');
                console.log('Success:', data);

                if (type == 'POST') {
                    location.reload();
                } else {
                    var row = $('tr[data-id="' + data.id + '"]');
                    console.log('id:', data.id, row);
                    row.children('td.name').text(data.name);
                    row.children('td.price').text(data.price);
                    row.children('td.quantity').text(data.quantity);
                    row.children('td.images').text(data.images);
                }
            },
            error: function(data) {
                console.log('Error:', data);
                $('#btn-save').html('Save Changes');
            }
        });
    });

</script>
