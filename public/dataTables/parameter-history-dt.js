$(function () {
    $('#tblParameterHistory').DataTable({
        "dom": '<lBQf<t>ip>',
        buttons:
            [
                'copy', 'excel', 'print'
            ],
        "paging": true,
        "pageLength": 25,
        "processing": true,
        "serverside": true,
        "responsive": true,
        "ajax": "src/DataTables/ParameterHistoryTable.php"
    })
})