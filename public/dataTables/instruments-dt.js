$(function () {
    $('#tblInstruments').DataTable({
        "dom": '<lBf<t>ip>',
        buttons: [
            {
                text: 'Add New Instrument',
                action:function(){
                   $('#modal-new-instrument').modal('show');
                }
            },
            {
                extend: 'excel',
                title: 'Instruments Database',
                filename: 'Instruments Database',
                exportOptions: {
                    stripHtml: false,
                    columns: [1, 2, 3, 4, 5, 6, 7]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    stripHtml: false,
                    columns: [1, 2, 3, 4, 5, 6, 7]
                }
            }
        ],
        "paging": true,
        "pageLength": 25,
        "processing": true,
        "serverside": true,
        "responsive": true,
        "ajax": "src/DataTables/InstrumentsTable.php",
        columnDefs: [
            {
                targets: [0, 8, 9],
                visible: false,
            }
        ]
    })
})