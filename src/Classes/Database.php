<?php

class Database
{
    private $host = "127.0.0.1";
    private $username = "root";
    private $password = "CASAdatabase@123";
    private $dbname = "instrudb";

    public $con;

    public function __construct()
    {
        $this->con = null;

        try {
            $this->con = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo "Connection error: ", $exception->getMessage();
        }
    }

    public function DatabaseConnection()
    {
        return $this->con;
    }
}
