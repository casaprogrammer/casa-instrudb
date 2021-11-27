<?php

class Locations
{
    private $tableName = "locations";
    private $con;

    public $locationName;
    public $locations = array();

    public function __construct($database)
    {
        $this->con = $database;
    }

    public function AddLocation()
    {
        $query = "INSERT INTO " . $this->tableName . "
                  SET location_name=:locationName";

        $insertStatement = $this->con->prepare($query);
        $insertStatement->bindParam(':locationName', $this->locationName);

        return ($insertStatement->execute()) ?? false;
    }

    public function UpdateLocationDetail($id)
    {
        $query = "UPDATE " . $this->tableName . "
                  SET location_name=:locationName
                  WHERE id = $id";

        $updateStatement = $this->con->prepare($query);
        $updateStatement->bindParam(':locationName', $this->locationName);

        return ($updateStatement->execute()) ?? false;
    }

    public function GetLocations()
    {
        $query = "SELECT * FROM " . $this->tableName . "";
        $selectStatement = $this->con->prepare($query);
        $selectStatement->execute();

        while ($row = $selectStatement->fetch(PDO::FETCH_ASSOC)) {
            $locations[] = $row;
        }

        return $locations;
    }
}
