<?php

include $_SERVER['DOCUMENT_ROOT'] . '/InstruDB/src/Classes/Database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/InstruDB/src/Classes/Logbook.php';

$database = new Database();
$log = new Logbook($database->DatabaseConnection());


if ($_POST) {

    $instrumentId = $_POST['instrumentId'];
    $changes = json_decode($_POST['changesMade'], true);
    $status = false;

    for ($i = 0; $i < COUNT($changes); $i++) {
        $log->details = $changes[$i];
        $log->logType = "Changes";
        $log->logDate = date("Y-m-d");
        $log->instrumentId = $instrumentId;

        if($log->NewLog()){
            $status = true;
        }
    }

    echo json_encode($status);
}
