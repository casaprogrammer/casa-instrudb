<?php

include $_SERVER['DOCUMENT_ROOT'] . 'InstruDB/src/Classes/Database.php';
include $_SERVER['DOCUMENT_ROOT'] . 'InstruDB/src/Classes/Parameters.php';

$database = new Database();
$instrumentParameter = new Parameters($database->DatabaseConnection());

$saveSuccess = false;

if ($_POST) {

    $parameters = json_decode($_POST['parameters'], true);

    if (COUNT($parameters) > 0) {

        foreach ($parameters as $parameter) {
            if (!isset($parameter['parameterId'])) {
                $instrumentParameter->parameterName = $parameter['parameterName'];
                $instrumentParameter->parameterValue = $parameter['parameterValue'];
                $instrumentParameter->dateCalibration = date("Y-m-d", strtotime($parameter['dateCalibration']));

                $saveSuccess = $instrumentParameter->AddInstrumentParameter($_POST['instrumentId']);
            } else {
                $instrumentParameter->parameterName = $parameter['parameterName'];
                $instrumentParameter->parameterValue = $parameter['parameterValue'];
                $instrumentParameter->dateCalibration = date("Y-m-d", strtotime($parameter['dateCalibration']));

                $saveSuccess = $instrumentParameter->UpdateExistingParameter($parameter['parameterId']);
            }

            if ($saveSuccess) {
                $instrumentParameter->LogParameter($_POST['instrumentId']);
            }
        }
    } else {
        $saveSuccess = true;
    }


    echo json_encode($saveSuccess);
}
