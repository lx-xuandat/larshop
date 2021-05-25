<script>
    // IIFE - Immediately Invoked Function Expression
    (function($, window, document) {

        // The $ is now locally scoped
        function destroy(id) {
            console.log('destroy');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            return $.ajax({
                url: "/admin/customers/" + id,
                method: "DELETE",
            });
        }

        // Listen for the jQuery ready event on the document
        $(function() {
            var dtCustomers = $("#DataTable_Customers");
            var btnDestroy = $('#btn-destroy');
            var modalDelete = $('#deleteModal');
            var id;

            dtCustomers.on('click', '.btn-delete', function(e) {
                e.preventDefault();
                id = $(this).data("id");
                modalDelete.modal('show');
            });

            btnDestroy.on('click', function(e) {
                e.preventDefault();

                destroy(id).done(function(data) {
                    console.log(data);

                    if (data.status_code == 204) {
                        dtCustomers.DataTable().ajax.reload();
                    };
                    modalDelete.modal('hide');
                    alert(data.message);
                });
            });

        });
        // The rest of the code goes here!

    }(window.jQuery, window, document));
    // The global jQuery object is passed as a parameter

</script>
