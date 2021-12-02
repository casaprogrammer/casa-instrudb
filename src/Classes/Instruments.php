<?php

class Instruments
{
    private $tableName = "instruments";

    private $con;

    public $instrumentId;
    public $instrumentName;
    public $tagName;
    public $brand;
    public $model;
    public $serialNumber;
    public $category;
    public $location;


    public function __construct($database)
    {
        $this->con = $database;
    }

    public function NewInstrument()
    {
        $activeStatus = 1;

        $query = "INSERT INTO " . $this->tableName . "
                  SET 
                  instrument_name=:instrumentName, tag_name=:tagName, brand=:brand, 
                  model=:model, serial_number=:serialNumber, category_id=:category,
                  location_id=:location, status=:status
                 ";

        $insertStatement =  $this->con->prepare($query);

        $insertStatement->bindParam(":instrumentName", $this->instrumentName);
        $insertStatement->bindParam(":tagName", $this->tagName);
        $insertStatement->bindParam(":brand", $this->brand);
        $insertStatement->bindParam(":model", $this->model);
        $insertStatement->bindParam(":serialNumber", $this->serialNumber);
        $insertStatement->bindParam(":category", $this->category);
        $insertStatement->bindParam(":location", $this->location);
        $insertStatement->bindParam(":status", $activeStatus);

        return ($insertStatement->execute()) ? $this->con->lastInsertId() : false;
    }

    public function UpdateInstrument($instrumentId)
    {
        $query = "UPDATE " . $this->tableName . "
                SET 
                instrument_name=:instrumentName, tag_name=:tagName, brand=:brand, 
                model=:model, serial_number=:serialNumber, category_id=:category,
                location_id=:location
                WHERE `id` = $instrumentId";

        $updateStatement = $this->con->prepare($query);

        $updateStatement->bindParam(":instrumentName", $this->instrumentName);
        $updateStatement->bindParam(":tagName", $this->tagName);
        $updateStatement->bindParam(":brand", $this->brand);
        $updateStatement->bindParam(":model", $this->model);
        $updateStatement->bindParam(":serialNumber", $this->serialNumber);
        $updateStatement->bindParam(":category", $this->category);
        $updateStatement->bindParam(":location", $this->location);

        return ($updateStatement->execute()) ?? false;
    }

    public function UpdateInstrumentStatus($instrumentId, $status){

        $query = "UPDATE " . $this->tableName . "
                SET 
                status=:status
                WHERE `id` = $instrumentId";

        $updateStatement = $this->con->prepare($query);

        $updateStatement->bindParam(":status", $status);

        return ($updateStatement->execute()) ?? false;
    }
}
