$(function () {
    $('#tblLocations').DataTable({
        "dom": '<Bf<t>ip>',
        buttons: [
            {
                text: 'New',
                action:function(){
                   $('#modal-location-details').modal('show');
                }
            },
        ],
        "paging": true,
        "pageLength": 10,
        "processing": true,
        "serverside": true,
        "responsive": true,
        "ajax": "src/DataTables/LocationsTable.php",
        columnDefs: [
            {
                targets: [1],
                visible: false,
            }
        ]
    })
})