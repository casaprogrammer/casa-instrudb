<?php

class Logbook
{

    private $tableName = "logbook";
    private $con;

    public $details;
    public $logType;
    public $logDate;
    public $instrumentId;

    public function __construct($database)
    {
        $this->con = $database;
    }

    public function NewLog()
    {
        $query = "INSERT INTO " . $this->tableName . "
                  SET
                  details=:details, log_type=:logType, 
                  log_date=:logDate, instrument_id=:instrumentId";

        $insertStatement = $this->con->prepare($query);

        $insertStatement->bindParam(":details", $this->details);
        $insertStatement->bindParam(":logType", $this->logType);
        $insertStatement->bindParam(":logDate", $this->logDate);
        $insertStatement->bindParam(":instrumentId", $this->instrumentId);

        return ($insertStatement->execute()) ?? false;
    }

    public function EditLog($id)
    {
        $query = "UPDATE " . $this->tableName . "
                  SET
                  details=:details, log_type=:logType, 
                  log_date=:logDate
                  WHERE id=:id";

        $updateStatement = $this->con->prepare($query);

        $updateStatement->bindParam(":details", $this->details);
        $updateStatement->bindParam(":logType", $this->logType);
        $updateStatement->bindParam(":logDate", $this->logDate);
        $updateStatement->bindParam(":id", $id);

        return ($updateStatement->execute()) ?? false;
    }
}
