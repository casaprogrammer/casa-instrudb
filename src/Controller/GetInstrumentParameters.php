<?php

include $_SERVER['DOCUMENT_ROOT'] . 'InstruDB/src/Classes/Database.php';
include $_SERVER['DOCUMENT_ROOT'] . 'InstruDB/src/Classes/Parameters.php';

$database = new Database();
$instrumentParameter = new Parameters($database->DatabaseConnection());

$details = array();

if ($_GET) {

    $parameters = $instrumentParameter->GetInstrumentParameters($_GET['instrumentId']);

    while($row = $parameters->fetch(PDO::FETCH_ASSOC)){
        $data['parameterId'] = $row['id'];
        $data['parameterName'] = $row['parameter_name'];
        $data['parameterValue'] = $row['parameter_value'];
        $data['dateCalibration'] = $row['date_calibration'];

        array_push($details, $data);
    }

    echo json_encode($details);
}
