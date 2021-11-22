$(function () {

    $('#tblManageEquipment').DataTable({
        "processing": true,
        "serverside": true,
        "responsive": true,
        "ajax": "src/datatables/equipments_datatables.php",
        columnDefs: [
            {
                targets: [1, 10],
                visible: false
            }
        ]
    })
})