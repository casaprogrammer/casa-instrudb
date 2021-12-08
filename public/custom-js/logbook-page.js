$(function () {

    let table = $('#tblLogRecords').DataTable();

    $('#tblLogRecords').on('click', 'tr', function () {
        $('#modal-edit-log').modal('show');

        let $id = table.row(this).data()[0];
        let $logTitle = table.row(this).data()[1];
        let $details = table.row(this).data()[2];
        let $type = table.row(this).data()[3];
        let $date = table.row(this).data()[4];

        $('#modalLogTitle').html($logTitle);
        $('#logTypeRecorded').val($type);
        $('#dateLogRecorded').val($date);
        $('#logDetailsRecorded').val($details);
        $('#logId').val($id);
    });


    $('#buttonSaveEditedLog').on('click', function () {
        let
            $logId = $('#logId').val(),
            $logType = $('#logTypeRecorded').val(),
            $logDate = $('#dateLogRecorded').val(),
            $logDetails = $('#logDetailsRecorded').val();

        if ($('#logTypeRecorded').val() == "" || $('#logDetailsRecorded').val() == "") {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Log type/details field is empty',
                showConfirmButton: false,
                timer: 1500
            });
        }
        else {
            $.ajax({
                url: 'src/Controller/Logbook/EditLog.php',
                type: "POST",
                dataType: "json",
                encode: true,
                data: {
                    logType: $logType,
                    logDate: $logDate,
                    details: $logDetails,
                    logId: $logId
                }
            })
                .done(function (response) {
                    if (response) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Log saved Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function () {
                            $('#modal-edit-log').modal('hide');
                            table.ajax.reload();
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
                .fail(function (jqXHR, textStatus) {
                    console.log(jqXHR, textStatus);
                })
        }
    });

    $('#modal-edit-log').on('hidden.bs.modal', function () {
        $('#logTypeRecorded').val('');
        $('#logDetailsRecorded').val('');
    })
})