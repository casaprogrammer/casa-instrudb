<?php

include $_SERVER['DOCUMENT_ROOT'] . '/InstruDB/src/Classes/Database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/InstruDB/src/Classes/Logbook.php';

$database = new Database();
$log = new Logbook($database->DatabaseConnection());


if ($_POST) {

    

    echo json_encode($location->UpdateLocationDetail($_POST['id']));
}
