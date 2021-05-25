<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#btn-delete').click(function(e) {
            e.preventDefault();

            var allVals = [];
            var products = $("input.product-id[type=checkbox][name=product-id]:checked");

            products.each(function(index) {
                allVals.push($(this).val());
            });
            console.log(allVals);

            var join_selected_values = allVals.join(",");

            $.ajax({
                data: 'ids=' + join_selected_values,
                url: '/admin/products/deletes',
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    console.log('Success:', data);

                    products.each(function(index) {
                        $(this).parent().parent().remove();
                    });

                    alert(data.success);

                },
                error: function(data) {
                    console.log('Error:', data);
                    alert('Detete Fail.')
                }
            });
        });

    });

</script>
