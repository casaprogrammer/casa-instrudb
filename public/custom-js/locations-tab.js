$(function () {

    let table = $('#tblLocations').DataTable();
    let instrumentTable = $('#tblInstruments').DataTable();

    $('#tblLocations').on('click', 'tr', function () {
        $('#modal-location-details').modal('show');

        let $locationId = table.row(this).data()[1];
        let $locationName = table.row(this).data()[2];

        $('#inputLocationName').val($locationName);
        $('#locationId').val($locationId);
    })

    $('#buttonSaveLocation').on('click', function () {

        let $id = $('#locationId').val();
        let $name = $('#inputLocationName').val();

        if ($name == "") {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Location name field is blank',
                showConfirmButton: false,
                timer: 1500
            });
        }
        else {

            let ajaxUrl = "src/Controller/Location/AddNewLocation.php";

            if ($id != "") {
                ajaxUrl = "src/Controller/Location/UPdateLocation.php";
            }

            $.ajax({
                url: ajaxUrl,
                type: "POST",
                dataType: "json",
                data: {
                    id: $id,
                    locationName: $name
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
                            $('#modal-location-details').modal('hide');
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


    $('#modal-location-details').on('hidden.bs.modal', function () {
        $('#locationId').val('');
        $('#inputLocationName').val('');
    })

})