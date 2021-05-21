$(function () {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": true,
        "columnDefs": [{ targets: 0, orderable: false }]
    });

    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
