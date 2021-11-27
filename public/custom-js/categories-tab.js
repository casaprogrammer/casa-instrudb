$(function () {

    let table = $('#tblCategories').DataTable();
    let instrumentTable = $('#tblInstruments').DataTable();

    $('#tblCategories').on('click', 'tr', function () {
        $('#modal-category-details').modal('show');

        let $categoryId = table.row(this).data()[1];
        let $categoryname = table.row(this).data()[2];

        $('#inputCategoryName').val($categoryname);
        $('#categoryId').val($categoryId);
    })

    $('#buttonSaveCategory').on('click', function () {

        let $id = $('#categoryId').val();
        let $name = $('#inputCategoryName').val();

        if ($name == "") {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Category name field is blank',
                showConfirmButton: false,
                timer: 1500
            });
        }
        else {

            let ajaxUrl = "src/Controller/Category/AddNewCategory.php";

            if ($id != "") {
                ajaxUrl = "src/Controller/Category/UpdateCategory.php";
            }

            $.ajax({
                url: ajaxUrl,
                type: "POST",
                dataType: "json",
                data: {
                    id: $id,
                    categoryName: $name
                }
            })
                .done(function (response) {
                    if (response) {

                        table.ajax.reload();
                        instrumentTable.ajax.reload();

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Changes Saved Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        
                        setTimeout(function () {
                            $('#modal-category-details').modal('hide');
                        }, 1500);
                    }
                    else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Failed to save changes',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                })
                .fail(function (jqxhr, textStatus, error) {
                    console.log(jqxhr, textStatus, error);
                })
        }
    })


    $('#modal-category-details').on('hidden.bs.modal', function () {
        $('#categoryId').val('');
        $('#inputCategoryName').val('');
    })

})