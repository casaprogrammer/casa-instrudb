$(function () {

    let originalParameters = [];

    //Adding Parameters on New Instrument
    $('#addParameter').on('click', function () {
        let lastField = $("#divParameters div:last");
        let divId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
        let divWrapper = $("<div class=\"form-group row\" id=\"div" + divId + "\"/>");
        divWrapper.data("idx", divId);
        let optionLabel = $("<label for=\"Parameter\" class=\"col-form-label\"/></label>");
        let parameterName = $("<div class=\"col-sm-4\"><input type=\"text\" style=\"font-weight:bold\" class=\"form-control\" id=\"parameterName[]\" name=\"parameterName[]\" placeholder=\"Parameter Name\">" +
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
        $('#divNoParameterMessage').prop('hidden', true);

        let lastField = $("#divExistingParameters div:last");
        let divId = (lastField && lastField.length && lastField.data("idx") + 2) || 2;
        let divWrapper = $("<div class=\"form-group row\" id=\"div" + divId + "\"/>");
        divWrapper.data("idx", divId);
        let optionLabel = $("<label for=\"Parameter\" class=\"col-form-label\"/></label>");
        let parameterName = $("<div class=\"col-sm-4\"><input type=\"text\" style=\"font-weight:bold\" class=\"form-control\" id=\"updateParameterName[]\" name=\"updateParameterName[]\" placeholder=\"Parameter Name\">" +
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
            $parameters = [],
            saving = false;

        if ($location == null) {
            $location = 1;
        }

        if ($category == null) {
            $category = 1;
        }

        if ($('div[id="div1"]').length > 0) {
            $('div[id="div1"]').each(function () {
                if ($(this).find('input[id="parameterName[]"]').val() == "") {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: 'Add value or delete empty parameter',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
                else {
                    $parameters.push({
                        'parameterName': $(this).find('input[id="parameterName[]"]').val(),
                        'parameterValue': $(this).find('input[id="parameterValue[]"]').val(),
                        'dateCalibration': $(this).find('input[id="dateCalibration[]"]').val()
                    });

                    saving = true;
                }
            })
        }
        else {
            saving = true;
        }

        if ($instrumentName == '') {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Name field is empty',
                showConfirmButton: false,
                timer: 1500
            });
        }
        else {
            if (saving) {
                $.ajax({
                    url: 'src/Controller/Instrument/AddNewInstrument.php',
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
                    },
                    beforeSend: function () {
                        $('#loadingButton').prop('hidden', false);
                        $('#buttonSaveNewInstrument').prop('hidden', true);
                    }
                })
                    .done(function (response) {
                        if (response) {
                            $('#loadingButton').prop('hidden', true);
                            $('#buttonSaveNewInstrument').prop('hidden', false);
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
        }
    });

    //Update Instrument Details
    $('#updateInstrumentDetails').on('click', function () {
        let
            $instrumentId = $('#instrumentId').val(),
            $instrumentName = $("#instrumentName").val(),
            $tagName = $("#instrumentTagName").val(),
            $brand = $("#instrumentBrand").val(),
            $model = $("#instrumentModel").val(),
            $serialNumber = $("#instrumentSerialNumber").val(),
            $category = $("#instrumentCategory").val(),
            $location = $("#instrumentLocation").val();

        if ($location == null) {
            $location = 1;
        }

        if ($category == null) {
            $category = 1;
        }

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
                url: 'src/Controller/Instrument/UpdateInstrument.php',
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
                    location: $location
                }
            })
                .done(function (response) {
                    if (response) {

                        table.ajax.reload();

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Instrument Updated Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });
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

    //Update Instrument Parameters
    $('#updateInstrumentParameters').on('click', function () {
        let
            $instrumentId = $('#instrumentId').val(),
            $parameters = [],
            saving = false;

        if ($('div[id="div2"]').length > 0) {
            $('div[id="div2"]').each(function () {

                let updatedParameterId = $(this).find('input[id="updateParameterId[]"').val();
                let updatedParameterName = $(this).find('input[id="updateParameterName[]"]').val();
                let updatedParameterValue = $(this).find('input[id="updateParameterValue[]"]').val();
                let updatedParameterDate = $(this).find('input[id="updateDateCalibration[]"]').val();

                if ($(this).find('input[id="updateParameterName[]"]').val() == "") {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Add value or delete empty parameter',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
                else {
                    if (CheckParameterId(updatedParameterId)) {
                        if (!CheckParameter(updatedParameterName, updatedParameterValue, updatedParameterDate)) {
                            $parameters.push({
                                'parameterId': updatedParameterId,
                                'parameterName': updatedParameterName,
                                'parameterValue': updatedParameterValue,
                                'dateCalibration': updatedParameterDate
                            });
                        }
                    }
                    else {
                        $parameters.push({
                            'parameterId': updatedParameterId,
                            'parameterName': updatedParameterName,
                            'parameterValue': updatedParameterValue,
                            'dateCalibration': updatedParameterDate
                        });
                    }

                    saving = true;
                }
            })
        }

        if (saving) {
            $.ajax({
                url: 'src/Controller/Instrument/UpdateParameters.php',
                type: "POST",
                dataType: "json",
                encode: true,
                data: {
                    instrumentId: $instrumentId,
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
                            $('#modal-instrument-details').modal('hide');
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

        //console.log(CheckParameter('Pmax', '20 bar', '2021-11-26'));
    });



    /**
     * Table Functions
     * 
     * On click Row Buttons
     */

    let table = $('#tblInstruments').DataTable();

    $('#tblInstruments').on('click', 'button[id="buttonDetails"]', function () {

        /**
         * Responsive shrinking of rows
         */
        let $current_row = $(this).parents('tr');
        if ($current_row.hasClass('child')) {
            $current_row = $current_row.prev();
        }
        let $instrumentId = table.row($current_row).data()[0];
        let $categoryId = table.row($current_row).data()[8];
        let $locationId = table.row($current_row).data()[9];

        /**
         * Getting row data in appending to 
         * inputs on modal
         */
        $('#detailsTitle').html(table.row($current_row).data()[1]);

        $('#instrumentId').val($instrumentId);
        $('#instrumentName').val(table.row($current_row).data()[1]);
        $('#instrumentTagName').val(table.row($current_row).data()[2]);
        $('#instrumentBrand').val(table.row($current_row).data()[3]);
        $('#instrumentModel').val(table.row($current_row).data()[4]);
        $('#instrumentSerialNumber').val(table.row($current_row).data()[5]);
        $('#instrumentCategory').val(table.row($current_row).data()[8]);
        $('#instrumentLocation').val(table.row($current_row).data()[9]);


        /**
         * Dynamic Category dropdown
         */
        $.ajax({
            url: "src/Controller/Category/GetAllCategory.php",
            type: "GET",
            dataType: "json",
            encode: true
        })
            .done(function (data) {
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    if (data[i].id == $categoryId) {
                        html += "<option value=" + data[i].id + " selected>" + data[i].category_name + "</option>";
                    }
                    else {
                        html += "<option value=" + data[i].id + ">" + data[i].category_name + "</option>";
                    }
                }
                $('#instrumentCategory').append(html);
            })
            .fail(function (jqxhr, textStatus, error) {
                console.log(jqxhr, textStatus, error);
            })

        /**
         * Dynamic Locations Dropdown
         */
        $.ajax({
            url: "src/Controller/Location/GetLocations.php",
            type: "GET",
            dataType: "json",
            encode: true
        })
            .done(function (data) {
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    if (data[i].id == $locationId) {
                        html += "<option value=" + data[i].id + " selected>" + data[i].location_name + "</option>";
                    }
                    else {
                        html += "<option value=" + data[i].id + ">" + data[i].location_name + "</option>";
                    }
                }
                $('#instrumentLocation').append(html);
            })
            .fail(function (jqxhr, textStatus, error) {
                console.log(jqxhr, textStatus, error);
            })


        /**
         * Show modal
         */
        $('#modal-instrument-details').modal('show');


        /**
         * Populating (divExistingParameters) div
         */
        $.ajax({
            url: "src/Controller/Instrument/GetInstrumentParameters.php?instrumentId=" + $instrumentId,
            type: "GET",
            dataType: "json",
            beforeSend: function () {
                $('#parameterLoadingSpinner').prop('hidden', false);
            }
        })
            .done(function (data) {
                if(data.length == 0){
                    let divContent = $("<div class=\"text-center\" id=\"divNoParameterMessage\">No Parameter Data Available</div>");
                    $('#divExistingParameters').append(divContent);
                }
                for (var i = 0; i < data.length; i++) {

                    /**
                     * Store original values 
                     * For checking changes
                     */
                    originalParameters.push({
                        'parameterId': data[i].parameterId,
                        'parameterName': data[i].parameterName,
                        'parameterValue': data[i].parameterValue,
                        'dateCalibration': data[i].dateCalibration
                    });


                    /**
                     * Appending all instrument parameter
                     * to divParameter
                     */
                    let lastField = $("#divParameters div:last");
                    let divId = (lastField && lastField.length && lastField.data("idx") + 2) || 2;
                    let divWrapper = $("<div class=\"form-group row\" id=\"div" + divId + "\"/>");
                    divWrapper.data("idx", divId);
                    let optionLabel = $("<label for=\"Parameter\" class=\"col-form-label\"/></label>");
                    let parameterId = $("<div class=\"col-sm-4\" hidden><input type=\"text\" class=\"form-control\" value=" + data[i].parameterId + " id=\"updateParameterId[]\" name=\"updateParameterId[]\" placeholder=\"Parameter Name\">" +
                        "</div>");
                    let parameterName = $("<div class=\"col-sm-4\"><input type=\"text\" style=\"font-weight:bold\" class=\"form-control\" value='" + data[i].parameterName + "' id=\"updateParameterName[]\" name=\"updateParameterName[]\" placeholder=\"Parameter Name\">" +
                        "</div>");
                    let parameterValue = $("<div class=\"col-sm-4\"><input type=\"text\" class=\"form-control\" value='" + data[i].parameterValue + "' id=\"updateParameterValue[]\" name=\"updateParameterValue[]\" placeholder=\"Value\">" +
                        "</div>");
                    let dateCalibrated = $("<div class=\"col-sm-3\"><input type=\"date\" class=\"form-control\" value=" + data[i].dateCalibration + " id=\"updateDateCalibration[]\" name=\"updateDateCalibration[]\"" +
                        "</div>");
                    let removeButton = $("<button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash\"></button>");


                    /**
                     * Function to dynamically delete parameter values 
                     * from the UI and database
                     */
                    removeButton.click(function () {

                        $parameterId = $(this).parent().find('input[id="updateParameterId[]"]').val();

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You're permanently deleting this parameter",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Delete'
                        }).then((result) => {
                            if (result.value == true) {

                                $.ajax({
                                    url: "src/Controller/Instrument/DeleteInstrumentParameter.php",
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
                                            RemoveParameter($parameterId);

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

                $('#parameterLoadingSpinner').prop('hidden', true);
            })

            .fail(function (jqXHR, textStatus) {
                console.log(jqXHR, textStatus);
            })
    })

    $('#tblInstruments').on('click', 'button[id="buttonHistory"]', function () {

        $('#modal-parameter-history').modal('show');

        /**
         * On row responsive
         */
        let $current_row = $(this).parents('tr');
        if ($current_row.hasClass('child')) {
            $current_row = $current_row.prev();
        }
        let $instrumentId = table.row($current_row).data()[0];

        /**
         * Card Title
         */
        $('#parameterHistoryTitle').html(table.row($current_row).data()[1]);
        let $historyTitle = $('#parameterHistoryTitle').html();

        $.ajax({
            url: "src/Controller/Instrument/GetAllParameters.php?instrumentId=" + $instrumentId,
            type: "GET",
            dataType: "json"
        })
            .done(function (data) {
                var currentParameter = '';

                /**
                 * Appending Parameter Data on tbody
                 */
                $.each(data, function (i, data) {

                    var body = "<tr>";

                    // Checks whether current parameter is still the same
                    // If yes, next row text will be less visible (opacity)
                    if (currentParameter != data.parameterName) {
                        var body = "<tr>";
                        body += "<td>" + data.parameterName + "</td>";
                        body += "<td>" + data.parameterValue + "</td>";
                        body += "<td>" + data.dateCalibration + "</td>";
                        body += "</tr>";
                    }
                    else {
                        body += "<td style='opacity:0.1'>" + data.parameterName + "</td>";
                        body += "<td>" + data.parameterValue + "</td>";
                        body += "<td>" + data.dateCalibration + "</td>";
                        body += "</tr>";
                    }

                    currentParameter = data.parameterName;

                    $('#tblParameterHistory tbody').append(body);

                });

                //Initialize Parameter history table
                $('#tblParameterHistory').DataTable({
                    destory: true,
                    "dom": '<lBQf<t>ip>',
                    buttons: [
                        {
                            extend: 'excel',
                            title: $historyTitle + ' Parameter History',
                            filename: $historyTitle + ' Parameter History',
                            exportData: {
                                stripHtml: false
                            }
                        },

                        'print'
                    ]
                });
            })

            .fail(function (jqXHR, textStatus) {
                console.log(jqXHR, textStatus);
            })
    })



    /**
     * Modal Functions
     * 
     */

    $('#modal-new-instrument').on('show.bs.modal', function () {

        /**
         * Categories Dropdown
         */
        $.ajax({
            url: "src/Controller/Category/GetAllCategory.php",
            type: "GET",
            dataType: "json",
            encode: true
        })
            .done(function (data) {
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += "<option value=" + data[i].id + ">" + data[i].category_name + "</option>";
                }
                $('#selectCategory').append(html);
            })
            .fail(function (jqxhr, textStatus, error) {
                console.log(jqxhr, textStatus, error);
            })

        /**
         * Locations Dropdown
         */
        $.ajax({
            url: "src/Controller/Location/GetLocations.php",
            type: "GET",
            dataType: "json",
            encode: true
        })
            .done(function (data) {
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += "<option value=" + data[i].id + ">" + data[i].location_name + "</option>";
                }
                $('#selectLocation').append(html);
            })
            .fail(function (jqxhr, textStatus, error) {
                console.log(jqxhr, textStatus, error);
            })

    })

    $('#modal-new-instrument').on('hidden.bs.modal', function () {
        $("#inputName").val('');
        $("#inputTagName").val('');
        $("#inputBrand").val('');
        $("#inputModel").val('');
        $("#inputSerialNumber").val('');
        $("#selectLocation").val('0');
        $('#divParameters').html("");


        $("#selectCategory, #selectLocation").empty();
        $("#selectCategory, #selectLocation").append('<option value="0" selected="" disabled="">Select one</option>');
    })

    $('#modal-instrument-details').on('hidden.bs.modal', function () {
        $('#divExistingParameters').html('');
        $("#instrumentCategory, #instrumentLocation").empty();
        $("#instrumentCategory, #instrumentLocation").append('<option value="0" selected="" disabled="">Select one</option>');
    })

    $('#modal-parameter-history').on('hidden.bs.modal', function () {
        $('#tblParameterHistory tbody').empty();
        $('#tblParameterHistory').DataTable().clear();
        $('#tblParameterHistory').DataTable().destroy();

    })



    /**
     * Functions
     */

    function OnModalSave() {
        table.ajax.reload();
        if ($('#modal-new-instrument').hasClass('show')) {
            $('#modal-new-instrument').modal('hide');
        }

        if ($('#modal-instrument-details').hasClass('show')) {
            $('#modal-instrument-details').modal('hide');
        }
    }

    function CheckParameterId(id) {
        let existingValue = false;

        if (originalParameters.length > 0) {
            for (var i = 0; i < originalParameters.length; i++) {
                if (originalParameters[i].parameterId == id) {

                    existingValue = true;
                    break;
                }
            }
        }

        return existingValue;
    }

    function CheckParameter(name, value, date) {
        let existingValues = false;

        if (originalParameters.length > 0) {
            for (var i = 0; i < originalParameters.length; i++) {
                if (originalParameters[i].dateCalibration == date &&
                    originalParameters[i].parameterValue == value &&
                    originalParameters[i].parameterName == name) {

                    existingValues = true;
                    break;
                }
            }
        }

        return existingValues;
    }

    // function CheckParameterValue(value, date) {
    //     let equal = false;

    //     if (originalParameters.length > 0) {
    //         for (var i = 0; i < originalParameters.length; i++) {
    //             if (originalParameters[i].dateCalibration == date && originalParameters[i].parameterValue == value) {
    //                 equal = true;
    //                 break;
    //             }
    //         }
    //     }

    //     return equal;
    // }

    function RemoveParameter(id) {
        for (var i = 0; i < originalParameters.length; i++) {
            if (originalParameters[i].parameterId == id) {
                originalParameters.splice(i, 1);
            }
        }

        return originalParameters;
    }
});