<?php

include $_SERVER['DOCUMENT_ROOT'] . '/InstruDB/src/Classes/Database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/InstruDB/src/Classes/Instruments.php';

$database = new Database();
$instrument = new Instruments($database->DatabaseConnection());

if ($_POST) {

    $updateInstrument = $instrument->UpdateInstrumentStatus($_POST['instrumentId'], $_POST['status']);

    echo json_encode($updateInstrument);
}
