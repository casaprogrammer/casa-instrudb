<?php

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "jesiah";
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

        return $this->con;
    }
}
