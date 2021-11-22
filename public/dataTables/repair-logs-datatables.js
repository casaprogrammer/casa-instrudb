$(function () {
    $('#tblRepairLogs').DataTable({
        "pageLength" : 25,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                exportOptions: {
                    stripHtml: false,
                    columns: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    stripHtml: false,
                    columns: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                },
            }
        ],
        "processing": true,
        "serverside": true,
        "responsive": true,
        "ajax": "src/datatables/repair_logs_datatables.php",
        columnDefs: [
            {
                targets: [1, 6, 7, 8, 9, 10],
                visible: false
            }
        ]
    });
});
