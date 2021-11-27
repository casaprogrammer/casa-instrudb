$(function () {
    $('#tblCategories').DataTable({
        "dom": '<Bf<t>ip>',
        buttons: [
            {
                text: 'New',
                action:function(){
                   $('#modal-category-details').modal('show');
                }
            },
        ],
        "paging": true,
        "pageLength": 10,
        "processing": true,
        "serverside": true,
        "responsive": true,
        "ajax": "src/DataTables/CategoriesTable.php",
        columnDefs: [
            {
                targets: [1],
                visible: false,
            }
        ]
    })
})