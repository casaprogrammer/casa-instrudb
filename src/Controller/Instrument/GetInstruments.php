<?php

include $_SERVER['DOCUMENT_ROOT'] . '/InstruDB/src/Classes/Database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/InstruDB/src/Classes/Instruments.php';

$database = new Database();
$instruments = new Instruments($database->DatabaseConnection());


echo json_encode($instruments->GetInstrumentsDetails());
