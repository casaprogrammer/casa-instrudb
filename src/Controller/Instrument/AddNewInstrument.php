<?php

include $_SERVER['DOCUMENT_ROOT'] . 'InstruDB/src/Classes/Database.php';
include $_SERVER['DOCUMENT_ROOT'] . 'InstruDB/src/Classes/Instruments.php';
include $_SERVER['DOCUMENT_ROOT'] . 'InstruDB/src/Classes/Parameters.php';

$database = new Database();
$instrument = new Instruments($database->DatabaseConnection());
$instrumentParameter = new Parameters($database->DatabaseConnection());

$saveSuccess = false;

if ($_POST) {

    $instrument->instrumentName = $_POST['instrumentName'];
    $instrument->tagName = $_POST['tagName'];
    $instrument->brand = $_POST['brand'];
    $instrument->model = $_POST['model'];
    $instrument->serialNumber = $_POST['serialNumber'];
    $instrument->category = $_POST['category'];
    $instrument->location = $_POST['location'];

    $lastId = $instrument->NewInstrument();

    if ($lastId != FALSE) {

        $parameters = json_decode($_POST['parameters'], true);

        if (COUNT($parameters) > 0) {

            foreach ($parameters as $parameter) {
                $instrumentParameter->parameterName = $parameter['parameterName'];
                $instrumentParameter->parameterValue = $parameter['parameterValue'];
                $instrumentParameter->dateCalibration = date("Y-m-d", strtotime($parameter['dateCalibration']));

                $saveSuccess = $instrumentParameter->AddInstrumentParameter($lastId);

                if($saveSuccess){
                    $instrumentParameter->LogParameter($lastId);
                }
            }
        } else {
            $saveSuccess = true;
        }
    }


    echo json_encode($saveSuccess);
}
