$(function () {

    $("#instruments-link").on("click", function () {
        $("#locations-div, #categories-div").prop("hidden", true);
        $("#instruments-div").prop("hidden", false);
        return false;
    });

    $("#categories-link").on("click", function () {
        $("#instruments-div, #locations-div").prop("hidden", true);
        $("#categories-div").prop("hidden", false);
        return false;
    });

    $("#locations-link").on("click", function () {
        $("#instruments-div, #categories-div").prop("hidden", true);
        $("#locations-div").prop("hidden", false);
        return false;
    });


    //Adding Parameters
    $('#addParameter').on('click', function () {
        var lastField = $("#divParameters div:last");
        var divId = (lastField && lastField.length && lastField.data("idx") + 2) || 2;
        var divWrapper = $("<div class=\"form-group row\" id=\"div" + divId + "\"/>");
        divWrapper.data("idx", divId);
        var optionLabel = $("<label for=\"Parameter\" class=\"col-form-label\"/></label>");
        var parameterName = $("<div class=\"col-sm-5\"><input type=\"text\" class=\"form-control\" id=\"parameterName[]\" name=\"parameterName[]\" placeholder=\"Parameter Name\" required>" +
            "</div>");
        var parameterValue = $("<div class=\"col-sm-6\"><input type=\"text\" class=\"form-control\" id=\"parameterValue[]\" name=\"parameterValue[]\" placeholder=\"Value\" required>" +
            "</div>");
        var removeButton = $("<button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash\"></button>");
        removeButton.click(function () {
            $(this).parent().remove();
        });

        divWrapper.append(optionLabel);
        divWrapper.append(parameterName);
        divWrapper.append(parameterValue);
        divWrapper.append(removeButton);

        $('#divParameters').append(divWrapper);
    });
    
});