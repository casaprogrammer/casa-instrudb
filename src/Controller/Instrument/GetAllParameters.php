<?php

include $_SERVER['DOCUMENT_ROOT'] . '/InstruDB/src/Classes/Database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/InstruDB/src/Classes/Parameters.php';

$database = new Database();
$instrumentParameter = new Parameters($database->DatabaseConnection());

$details = array();

if ($_GET) {

    $parameters = $instrumentParameter->GetAllInstrumentParameters($_GET['instrumentId']);

    if (isset($parameters)) {
        while ($row = $parameters->fetch(PDO::FETCH_ASSOC)) {
            $data['parameterName'] = $row['parameter_name'];
            $data['parameterValue'] = $row['parameter_value'];
            $data['dateCalibration'] = $row['date_calibration'];

            array_push($details, $data);
        }
    }

    echo json_encode($details);
}
