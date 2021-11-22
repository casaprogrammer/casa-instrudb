$(function(){

    $('#tblManagePersonnel').DataTable({
        "processing": true,
        "serverside": true,
        "responsive": true,
        "ajax": "src/datatables/personnel_details_datatables.php",
        columnDefs: [
            {
                targets: [1],
                visible: false
            }
        ]
    })
})