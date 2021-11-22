<?php

include $_SERVER['DOCUMENT_ROOT'] . 'InstruDB/src/Classes/Database.php';
include $_SERVER['DOCUMENT_ROOT'] . 'InstruDB/src/Classes/Instruments.php';

$database = new Database();
$instrument = new Instruments($database->DatabaseConnection());

if ($_POST) {

    $instrument->instrumentName = $_POST['instrumentName'];
    $instrument->tagName = $_POST['tagName'];
    $instrument->brand = $_POST['brand'];
    $instrument->model = $_POST['model'];
    $instrument->serialNumber = $_POST['serialNumber'];
    $instrument->location = $_POST['location'];

    echo json_encode($instrument->NewInstrument());
}
