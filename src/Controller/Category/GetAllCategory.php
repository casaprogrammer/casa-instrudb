<?php

include $_SERVER['DOCUMENT_ROOT'] . 'InstruDB/src/Classes/Database.php';
include $_SERVER['DOCUMENT_ROOT'] . 'InstruDB/src/Classes/Categories.php';

$database = new Database();
$categories = new Categories($database->DatabaseConnection());

$details = array();

if ($_GET) {

    foreach($categories as $category){
        $data['categoryId'] = $row['id'];
        $data['categoryName'] = $row['category_name'];

        array_push($details, $data);
    }

    echo json_encode($details);
}
