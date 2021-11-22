<?php

class Instruments
{
    private $tableName = "instruments";

    private $con;

    public $instrumentName;
    public $tagName;
    public $brand;
    public $model;
    public $serialNumber;
    public $location;

    public function __construct($database)
    {
        $this->con = $database;
    }

    public function NewInstrument()
    {
        $query = "INSERT INTO " . $this->tableName . "
                  SET 
                  instrument_name=:instrumentName, tag_name=:tagName, brand=:brand, 
                  model=:model, serial_number=:serialNumber, location_id=:location
                 ";
        
        $insertStatement =  $this->con->prepare($query);

        $insertStatement->bindParam(":instrumentName", $this->instrumentName);
        $insertStatement->bindParam(":tagName", $this->tagName);
        $insertStatement->bindParam(":brand", $this->brand);
        $insertStatement->bindParam(":model", $this->model);
        $insertStatement->bindParam(":serialNumber", $this->serialNumber);
        $insertStatement->bindParam(":location", $this->location);

        return ($insertStatement->execute()) ? true : false;
    }
}
