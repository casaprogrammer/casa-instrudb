$(function () {

    $('#buttonSaveLog').on('click', function () {
        let $instrumentId = $('#datalistInstruments').on(':selected').val();

        alert($instrumentId);
    })

    var xhr;
    $('#modal-new-log').on('show.bs.modal', function () {
        
    })
})