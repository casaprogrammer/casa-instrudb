<?php

include $_SERVER['DOCUMENT_ROOT'] . '/InstruDB/src/Classes/Database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/InstruDB/src/Classes/Locations.php';

$database = new Database();
$location = new Locations($database->DatabaseConnection());


if ($_POST) {

    $location->locationName = $_POST['locationName'];

    echo json_encode($location->AddLocation());
}
