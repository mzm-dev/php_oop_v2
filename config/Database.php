<?php
/**
 * Created by PhpStorm.
 * User: mohamadzaki
 * Date: 23/02/2019
 * Time: 9:00 PM
 */

class Database
{
// specify your own database credentials
    private $host;
    private $db_name;
    private $username;
    private $password;
    public $conn;

    public function __construct($host, $user, $pwd, $db)
    {
        $this->host = $host;
        $this->username = $user;
        $this->password = $pwd;
        $this->db_name = $db;

        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
            die();
        }


    }

    public function connection()
    {
        return $this->conn;
    }
}