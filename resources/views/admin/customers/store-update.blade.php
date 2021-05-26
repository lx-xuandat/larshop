<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        var dtCustomers = $("#DataTable_Customers");

        $('#DataTable_Customers').on('click', '.btn-edit', function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            $('#btn-save').attr('data-id', id).val('update');

            $.ajax({
                url: "/admin/customers/" + id,
                method: 'GET',
                success: function(response) {
                    console.log(response.customer);
                    var customer = response.customer;

                    for (const [key, value] of Object.entries(customer)) {
                        $('#' + key).val(value);
                    }

                    $('#password').val("");
                    $('#editModal').modal(focus);
                }
            });
        });

        $('#btn-add').click(function(e) {
            e.preventDefault();
            console.log('btn-add');

            $('#modalFormCustomer').trigger("reset");
            $('#editModal').modal('show');
            $('#btn-save').val('store');
        });

        $('#btn-save').click(function() {
            // e.preventDefault();
            console.log('btn-save');

            var set_type = 'POST';
            var base_url = '/admin/customers';
            if ($('#btn-save').val() == 'update') {
                set_type = 'PUT';
                base_url += '/' + $(this).data('id');
            }



            $.ajax({
                data: $('#editModal form').serialize(),
                url: base_url,
                type: 'POST',
                dataType: 'json',
                success: function(result) {
                    console.log(result);

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    })

                },
                error: function(result) {
                    console.log(result.responseJSON.message);

                    Swal.fire({
                        position: 'top-end',
                        icon: 'fail',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
            });
            dtCustomers.DataTable().ajax.reload();
            $('#editModal').modal('hide');
        });
    });

</script>
