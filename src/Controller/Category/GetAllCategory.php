<?php

include $_SERVER['DOCUMENT_ROOT'] . 'InstruDB/src/Classes/Database.php';
include $_SERVER['DOCUMENT_ROOT'] . 'InstruDB/src/Classes/Categories.php';

$database = new Database();
$categories = new Categories($database->DatabaseConnection());


echo json_encode($categories->GetAllCategories());
