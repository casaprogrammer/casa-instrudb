<?php

include $_SERVER['DOCUMENT_ROOT'] . '/InstruDB/src/Classes/Database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/InstruDB/src/Classes/Categories.php';

$database = new Database();
$category = new Categories($database->DatabaseConnection());


if ($_POST) {

    $category->categoryName = $_POST['categoryName'];

    echo json_encode($category->AddCategory());
}
