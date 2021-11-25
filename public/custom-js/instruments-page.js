$(function () {

    //Adding Parameters on New Instrument
    $('#addParameter').on('click', function () {
        let lastField = $("#divParameters div:last");
        let divId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
        let divWrapper = $("<div class=\"form-group row\" id=\"div" + divId + "\"/>");
        divWrapper.data("idx", divId);
        let optionLabel = $("<label for=\"Parameter\" class=\"col-form-label\"/></label>");
        let parameterName = $("<div class=\"col-sm-4\"><input type=\"text\" class=\"form-control\" id=\"parameterName[]\" name=\"parameterName[]\" placeholder=\"Parameter Name\">" +
            "</div>");
        let parameterValue = $("<div class=\"col-sm-4\"><input type=\"text\" class=\"form-control\" id=\"parameterValue[]\" name=\"parameterValue[]\" placeholder=\"Value\">" +
            "</div>");
        let dateCalibrated = $("<div class=\"col-sm-3\"><input type=\"date\" class=\"form-control\" id=\"dateCalibration[]\" name=\"dateCalibration[]\"" +
            "</div>");
        let removeButton = $("<button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash\"></button>");

        removeButton.click(function () {
            $(this).parent().remove();
        });

        divWrapper.append(optionLabel);
        divWrapper.append(parameterName);
        divWrapper.append(parameterValue);
        divWrapper.append(dateCalibrated);
        divWrapper.append(removeButton);


        $('#divParameters').append(divWrapper);
    });

    //Adding Parameters with Existing Parameters
    $('#addNewParameter').on('click', function () {
        let lastField = $("#divExistingParameters div:last");
        let divId = (lastField && lastField.length && lastField.data("idx") + 2) || 2;
        let divWrapper = $("<div class=\"form-group row\" id=\"div" + divId + "\"/>");
        divWrapper.data("idx", divId);
        let optionLabel = $("<label for=\"Parameter\" class=\"col-form-label\"/></label>");
        let parameterName = $("<div class=\"col-sm-4\"><input type=\"text\" class=\"form-control\" id=\"updateParameterName[]\" name=\"updateParameterName[]\" placeholder=\"Parameter Name\">" +
            "</div>");
        let parameterValue = $("<div class=\"col-sm-4\"><input type=\"text\" class=\"form-control\" id=\"updateParameterValue[]\" name=\"updateParameterValue[]\" placeholder=\"Value\">" +
            "</div>");
        let dateCalibrated = $("<div class=\"col-sm-3\"><input type=\"date\" class=\"form-control\" id=\"updateDateCalibration[]\" name=\"updateDateCalibration[]\"" +
            "</div>");
        let removeButton = $("<button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash\"></button>");

        removeButton.click(function () {
            $(this).parent().remove();
        });

        divWrapper.append(optionLabel);
        divWrapper.append(parameterName);
        divWrapper.append(parameterValue);
        divWrapper.append(dateCalibrated);
        divWrapper.append(removeButton);


        $('#divExistingParameters').append(divWrapper);
    });

    //New Instrument
    $('#buttonSaveNewInstrument').on('click', function () {
        let
            $instrumentName = $("#inputName").val(),
            $tagName = $("#inputTagName").val(),
            $brand = $("#inputBrand").val(),
            $model = $("#inputModel").val(),
            $serialNumber = $("#inputSerialNumber").val(),
            $category = $("#selectCategory").val(),
            $location = $("#selectLocation").val(),
            $parameters = [];

        if ($location == null) {
            $location = 1;
        }

        if ($category == null) {
            $category = 1;
        }

        $('div[id="div1"]').each(function () {
            $parameters.push({
                'parameterName': $(this).find('input[id="parameterName[]"]').val(),
                'parameterValue': $(this).find('input[id="parameterValue[]"]').val(),
                'dateCalibration': $(this).find('input[id="dateCalibration[]"]').val()
            });
        })

        if ($instrumentName == '') {
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: 'Name field is empty',
                showConfirmButton: false,
                timer: 1500
            });
        }
        else {
            $.ajax({
                url: 'src/Controller/AddNewInstrument.php',
                type: "POST",
                dataType: "json",
                encode: true,
                data: {
                    instrumentName: $instrumentName,
                    tagName: $tagName,
                    brand: $brand,
                    model: $model,
                    serialNumber: $serialNumber,
                    category: $category,
                    location: $location,
                    parameters: JSON.stringify($parameters)
                }
            })
                .done(function (response) {
                    if (response) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Instrument Saved Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function () {
                            OnModalSave();
                        }, 1500);
                    }
                    else {
                        Swal.fire({
                            position: 'top-center',
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

    //Update Instrument
    $('#buttonUpdateInstrument').on('click', function () {
        let
            $instrumentId = $('#instrumentId').val(),
            $instrumentName = $("#instrumentName").val(),
            $tagName = $("#instrumentTagName").val(),
            $brand = $("#instrumentBrand").val(),
            $model = $("#instrumentModel").val(),
            $serialNumber = $("#instrumentSerialNumber").val(),
            $category = $("#instrumentCategory").val(),
            $location = $("#instrumentLocation").val(),
            $parameters = [];

        if ($location == null) {
            $location = 1;
        }

        if ($category == null) {
            $category = 1;
        }

        $('div[id="div2"]').each(function () {
            $parameters.push({
                'parameterId': $(this).find('input[id="updateParameterId[]"').val(),
                'parameterName': $(this).find('input[id="updateParameterName[]"]').val(),
                'parameterValue': $(this).find('input[id="updateParameterValue[]"]').val(),
                'dateCalibration': $(this).find('input[id="updateDateCalibration[]"]').val()
            });
        })

        if ($instrumentName == '') {
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: 'Name field is empty',
                showConfirmButton: false,
                timer: 1500
            });
        }
        else {
            $.ajax({
                url: 'src/Controller/UpdateInstrument.php',
                type: "POST",
                dataType: "json",
                encode: true,
                data: {
                    instrumentId: $instrumentId,
                    instrumentName: $instrumentName,
                    tagName: $tagName,
                    brand: $brand,
                    model: $model,
                    serialNumber: $serialNumber,
                    category: $category,
                    location: $location,
                    parameters: JSON.stringify($parameters)
                }
            })
                .done(function (response) {
                    if (response) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Instrument Updated Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function () {
                            OnModalSave();
                        }, 1500);
                    }
                    else {
                        Swal.fire({
                            position: 'top-center',
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


    /**
     * Table Functions
     * 
     * On click Row Buttons
     */

    let table = $('#tblInstruments').DataTable();

    $('#tblInstruments').off('click').on('click', 'button[id="buttonDetails"]', function () {

        $('#modal-instrument-details').modal('show');

        let $current_row = $(this).parents('tr');
        if ($current_row.hasClass('child')) {
            $current_row = $current_row.prev();
        }
        let $instrumentId = table.row($current_row).data()[0];

        $('#detailsTitle').html(table.row($current_row).data()[1]);

        $('#instrumentId').val($instrumentId);
        $('#instrumentName').val(table.row($current_row).data()[1]);
        $('#instrumentTagName').val(table.row($current_row).data()[2]);
        $('#instrumentBrand').val(table.row($current_row).data()[3]);
        $('#instrumentModel').val(table.row($current_row).data()[4]);
        $('#instrumentSerialNumber').val(table.row($current_row).data()[5]);
        $('#instrumentCategory').val(table.row($current_row).data()[8]);
        $('#instrumentLocation').val(table.row($current_row).data()[9]);


        $.ajax({
            url: "src/Controller/GetInstrumentParameters.php?instrumentId=" + $instrumentId,
            type: "GET",
            dataType: "json"
        })
            .done(function (data) {
                $('#divExistingParameters').html('');
                for (var i = 0; i < data.length; i++) {
                    let lastField = $("#divParameters div:last");
                    let divId = (lastField && lastField.length && lastField.data("idx") + 2) || 2;
                    let divWrapper = $("<div class=\"form-group row\" id=\"div" + divId + "\"/>");
                    divWrapper.data("idx", divId);
                    let optionLabel = $("<label for=\"Parameter\" class=\"col-form-label\"/></label>");
                    let parameterId = $("<div class=\"col-sm-4\" hidden><input type=\"text\" class=\"form-control\" value=" + data[i].parameterId + " id=\"updateParameterId[]\" name=\"updateParameterId[]\" placeholder=\"Parameter Name\">" +
                        "</div>");
                    let parameterName = $("<div class=\"col-sm-4\"><input type=\"text\" class=\"form-control\" value='" + data[i].parameterName + "' id=\"updateParameterName[]\" name=\"updateParameterName[]\" placeholder=\"Parameter Name\">" +
                        "</div>");
                    let parameterValue = $("<div class=\"col-sm-4\"><input type=\"text\" class=\"form-control\" value='" + data[i].parameterValue + "' id=\"updateParameterValue[]\" name=\"updateParameterValue[]\" placeholder=\"Value\">" +
                        "</div>");
                    let dateCalibrated = $("<div class=\"col-sm-3\"><input type=\"date\" class=\"form-control\" value=" + data[i].dateCalibration + " id=\"updateDateCalibration[]\" name=\"updateDateCalibration[]\"" +
                        "</div>");
                    let removeButton = $("<button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash\"></button>");

                    removeButton.click(function () {
                        $parameterId = $(this).parent().find('input[id="updateParameterId[]"]').val();

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You're deleting this parameter",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, Delete this.'
                        }).then((result) => {
                            if (result.value == true) {

                                $.ajax({
                                    url: "src/Controller/DeleteInstrumentParameter.php",
                                    type: "POST",
                                    dataType: "json",
                                    encode: true,
                                    data: {
                                        parameterId: $parameterId
                                    }
                                })
                                    .done(function (response) {
                                        if (response) {

                                            $(removeButton).parent().remove();

                                            Swal.fire({
                                                position: 'center',
                                                icon: 'success',
                                                title: 'Parameter Deleted',
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

                    divWrapper.append(optionLabel);
                    divWrapper.append(parameterId);
                    divWrapper.append(parameterName);
                    divWrapper.append(parameterValue);
                    divWrapper.append(dateCalibrated);
                    divWrapper.append(removeButton);

                    $('#divExistingParameters').append(divWrapper);
                }
            })

            .fail(function (jqXHR, textStatus) {
                console.log(jqXHR, textStatus);
            })
    })




    /**
     * Modal Functions
     * 
     */

    $('#modal-new-instrument').on('hidden.bs.modal', function () {
        $("#inputName").val('');
        $("#inputTagName").val('');
        $("#inputBrand").val('');
        $("#inputModel").val('');
        $("#inputSerialNumber").val('');
        $("#selectCategory").val('0');
        $("#selectLocation").val('0');
    })

    function OnModalSave() {
        table.ajax.reload();
        if ($('#modal-new-instrument').hasClass('show')) {
            $('#modal-new-instrument').modal('hide');
        }

        if ($('#modal-instrument-details').hasClass('show')) {
            $('#modal-instrument-details').modal('hide');
        }
    }

    function OnUpdate() {
        table.ajax.reload();
    }

});