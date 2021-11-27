$(function () {
    $('#tblCategories').DataTable({
        "dom": '<lBQf<t>ip>',
        buttons: [
            {
                text: 'New',
                action:function(){
                   $('#modal-new-instrument').modal('show');
                }
            },
        ],
        "paging": true,
        "pageLength": 10,
        "processing": true,
        "serverside": true,
        "responsive": true,
        "ajax": "src/DataTables/InstrumentsTable.php",
        columnDefs: [
            {
                targets: [0],
                visible: false,
            }
        ]
    })
})