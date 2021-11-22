$(function(){

    $('#tblManageDepartment').DataTable({
        "processing": true,
        "serverside": true,
        "responsive": true,
        "ajax": "src/datatables/department_details_datatables.php",
        columnDefs: [
            {
                targets: [1],
                visible: false
            }
        ]
    })
})