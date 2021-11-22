$(function () {

    $('#tblEquipmentArchive').DataTable({
        "processing": true,
        "serverside": true,
        "responsive": true,
        "ajax": "src/datatables/equipment_archive_datatables.php",
        columnDefs: [
            {
                targets: [1, 10],
                visible: false
            }
        ]
    })

    $('#tblPersonnelArchive').DataTable({
        "processing": true,
        "serverside": true,
        "responsive": true,
        "ajax": "src/datatables/personnel_archive_datatables.php",
        columnDefs: [
            {
                targets: [1],
                visible: false
            }
        ]
    })
})