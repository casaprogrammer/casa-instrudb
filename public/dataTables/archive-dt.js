$(function () {
    $('#tblArchive').DataTable({
        "dom": 'frtip',
        "paging": true,
        "pageLength": 25,
        "processing": true,
        "serverside": true,
        "responsive": true,
        "ajax": "src/DataTables/ArchiveTable.php",
        columnDefs: [
            {
                targets: [0, 8, 9],
                visible: false,
            }
        ]
    })
})