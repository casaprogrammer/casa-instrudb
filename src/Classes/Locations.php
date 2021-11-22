<?php

class Locations
{
    private $tableName = "locations";
    private $con;

    public $locations = array();

    public function __construct($database)
    {
        $this->con = $database;
    }

    public function GetLocations()
    {
        $query = "SELECT * FROM " . $this->tableName . "";
        $selectStatement = $this->con->prepare($query);
        $selectStatement->execute();

        while($row = $selectStatement->fetch(PDO::FETCH_ASSOC)){
            $locations[] = $row;
        }

        return $locations;
    }
}
