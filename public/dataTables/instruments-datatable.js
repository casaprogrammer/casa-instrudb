$(function () {

    $('#tblInstruments').DataTable({
        "dom": '<lBf<t>ip>',
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    stripHtml: false,
                    columns: [0, 2, 3, 4, 5, 6, 7]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    stripHtml: false,
                    columns: [0, 2, 3, 4, 5, 6, 7]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    stripHtml: false,
                    columns: [0, 2, 3, 4, 5, 6, 7]
                }
            }
        ],
        "paging": true,
        "pageLength": 25,
        "processing": true,
        "serverside": true,
        "responsive": true,
        "ajax": "src/DataTables/InstrumentTable.php",
        columnDefs: [
            {
                targets: [1],
                visible: false
            }
        ]
    })
})