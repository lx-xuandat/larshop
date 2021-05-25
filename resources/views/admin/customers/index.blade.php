<script>
    $(document).ready(function() {
        // init datatable.
        var dataTable = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            pageLength: 10,
            // scrollX: true,
            "order": [
                [0, "desc"]
            ],
            ajax: '{{ route('get-customers') }}',
            columns: [{
                    data: 'id',
                    name: 'id',
                },
                {
                    data: 'firstname',
                    name: 'firstname'
                },
                {
                    data: 'lastname',
                    name: 'lastname'
                },
                {
                    data: 'phone',
                    name: 'Phone'
                },
                {
                    data: 'email',
                    name: 'Email'
                },
                {
                    data: 'address',
                    name: 'Address'
                },
                {
                    data: 'Actions',
                    name: 'Actions',
                    orderable: false,
                    serachable: false,
                    sClass: 'text-center'
                },
            ]
        });
    });

</script>
