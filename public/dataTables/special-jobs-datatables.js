$(function () {
    $('#tblSpecialJobLogs').DataTable({
        "pageLength" : 25,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                exportOptions: {
                    stripHtml: false,
                    columns: [0, 1, 2, 3, 4, 5, 6]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    stripHtml: false,
                    columns: [0, 1, 2, 3, 4, 5, 6]
                },
            }
        ],
        "processing": true,
        "serverside": true,
        "responsive": true,
        "ajax": "src/datatables/special_job_logs_datatables.php",
        columnDefs: [
            {
                targets: [1],
                visible: false
            }
        ]
    });
});
