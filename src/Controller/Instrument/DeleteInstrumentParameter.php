<?php

include $_SERVER['DOCUMENT_ROOT'] . '/InstruDB/src/Classes/Database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/InstruDB/src/Classes/Parameters.php';

$database = new Database();
$instrumentParameter = new Parameters($database->DatabaseConnection());

if ($_POST) {

    $deleteSuccess = $instrumentParameter->DeleteInstrumentParameter($_POST['parameterId']);

    echo json_encode($deleteSuccess);
}
