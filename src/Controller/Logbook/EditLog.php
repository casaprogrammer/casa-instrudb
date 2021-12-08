<?php

include $_SERVER['DOCUMENT_ROOT'] . '/InstruDB/src/Classes/Database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/InstruDB/src/Classes/Logbook.php';

$database = new Database();
$log = new Logbook($database->DatabaseConnection());


if ($_POST) {

    $log->logType = htmlspecialchars(strip_tags($_POST['logType']));
    $log->details = htmlspecialchars(strip_tags($_POST['details']));
    $log->logDate = date('Y-m-d', strtotime($_POST['logDate']));

    echo json_encode($log->EditLog($_POST['logId']));
}
