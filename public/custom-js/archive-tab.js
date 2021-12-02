$(function () {

    let table = $('#tblInstruments').DataTable();
    let tableArchive = $('#tblArchive').DataTable();

    $('#tblArchive').on('click', 'button[id="buttonRestore"]', function () {

        let $current_row = $(this).parents('tr');
        if ($current_row.hasClass('child')) {
            $current_row = $current_row.prev();
        }
        let $instrumentId = tableArchive.row($current_row).data()[0];

        Swal.fire({
            title: 'Are you sure?',
            text: "You're archiving this instrument",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'orange',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Restore Instrument'
        }).then((result) => {
            if (result.value == true) {

                $.ajax({
                    url: 'src/Controller/Instrument/UpdateInstrumentStatus.php',
                    type: "POST",
                    dataType: "json",
                    encode: true,
                    data: {
                        instrumentId: $instrumentId,
                        status: 1 //Active Instrument status number
                    }
                })
                    .done(function (response) {
                        if (response) {

                            table.ajax.reload();
                            tableArchive.ajax.reload();

                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Instrument restored successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });

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
                    .fail(function (jqXHR, textStatus) {
                        console.log(jqXHR, textStatus);
                    })
            }
        })
    });
})