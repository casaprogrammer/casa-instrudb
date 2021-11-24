<?php

class Categories
{

    private $tableName = 'categories';
    private $con;

    public $categoryName;
    public $categories = array();

    public function __construct($database)
    {
        $this->con = $database;
    }

    public function GetAllCategories()
    {

        $query = "SELECT * FROM " . $this->tableName . "";
        $selectStatement = $this->con->prepare($query);
        $selectStatement->execute();

        while ($row = $selectStatement->fetch(PDO::FETCH_ASSOC)) {
            $categories[] = $row;
        }

        return $categories;
    }
}
