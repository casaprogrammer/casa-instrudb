<?php

class Parameters
{
    private $tableName = "parameters";
    private $con;

    public $parameterName;
    public $parameterValue;
    public $dateCalibration;
    public $instrumentId;


    public function __construct($database)
    {
        $this->con = $database;
    }

    public function AddInstrumentParameter($lastId)
    {
        $this->instrumentId = $lastId;

        $query = "INSERT INTO " . $this->tableName . "
                  SET 
                  parameter_name=:parameterName, parameter_value=:parameterValue,
                  instrument_id=:instrumentId, date_calibration=:dateCalibration";

        $insertStatement = $this->con->prepare($query);

        $insertStatement->bindParam(":parameterName", $this->parameterName);
        $insertStatement->bindParam(":parameterValue", $this->parameterValue);
        $insertStatement->bindParam(":instrumentId", $this->instrumentId);
        $insertStatement->bindParam(":dateCalibration", $this->dateCalibration);

        return ($insertStatement->execute()) ?? false;
    }

    public function UpdateExistingParameter($parameterId)
    {
        $query = "UPDATE " . $this->tableName . "
                  SET 
                  parameter_name=:parameterName, 
                  parameter_value=:parameterValue, 
                  date_calibration=:dateCalibration
                  WHERE `id` = $parameterId";

        $updateStatement = $this->con->prepare($query);

        $updateStatement->bindParam(":parameterName", $this->parameterName);
        $updateStatement->bindParam(":parameterValue", $this->parameterValue);
        $updateStatement->bindParam(":dateCalibration", $this->dateCalibration);

        return ($updateStatement->execute()) ?? false;
    }

    public function GetInstrumentParameters($instrumentId)
    {
        $query = "SELECT `id`, `parameter_name`, `parameter_value`, `date_calibration`
                  FROM " . $this->tableName . " 
                  WHERE `instrument_id` = $instrumentId ";

        $selectStatement = $this->con->prepare($query);
        $selectStatement->execute();

        return $selectStatement;
    }

    public function DeleteInstrumentParameter($parameterId)
    {
        $query = "DELETE FROM " . $this->tableName . "
                  WHERE `id` = $parameterId";

        $deleteStatement = $this->con->prepare($query);

        return ($deleteStatement->execute()) ?? false;
    }
}
