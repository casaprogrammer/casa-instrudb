$(function () {

    let table = $('#tblCategories').DataTable();

    $('#tblCategories').on('click', 'tr', function(){
        $('#modal-category-details').modal('show');

        let $categoryname = table.row(this).data()[2];
        $('#inputCategoryName').val($categoryname);

        
    })

})