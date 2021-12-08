$(function () {
    $('#tblLogRecords').DataTable({
        "dom": '<lBf<t>ip>',
        buttons: [
            'excel', 'print'
        ],
        "paging": true,
        "pageLength": 10,
        "processing": true,
        "serverside": true,
        "responsive": true,
        "ajax": "src/DataTables/Logbook.php",
        columnDefs: [
            {
                targets: [0],
                visible: false,
            }
        ]
    })
})