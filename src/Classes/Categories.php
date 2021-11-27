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

    public function AddCategory()
    {
        $query = "INSERT INTO " . $this->tableName . "
                  SET category_name=:categoryName";

        $insertStatement = $this->con->prepare($query);
        $insertStatement->bindParam(':categoryName', $this->categoryName);

        return ($insertStatement->execute()) ?? false;
    }

    public function UpdateCategoryDetail($id)
    {
        $query = "UPDATE " . $this->tableName . "
                  SET category_name=:categoryName
                  WHERE id = $id";

        $updateStatement = $this->con->prepare($query);
        $updateStatement->bindParam(':categoryName', $this->categoryName);

        return ($updateStatement->execute()) ?? false;
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
