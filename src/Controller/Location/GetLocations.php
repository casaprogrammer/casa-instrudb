<?php

include $_SERVER['DOCUMENT_ROOT'] . 'InstruDB/src/Classes/Database.php';
include $_SERVER['DOCUMENT_ROOT'] . 'InstruDB/src/Classes/Locations.php';

$database = new Database();
$locations = new Locations($database->DatabaseConnection());


echo json_encode($locations->GetLocations());
