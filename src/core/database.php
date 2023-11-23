<?php

class Database
{
    private static $instance = null;

    private $host = 'localhost';
    private $dbName = 'techart_db';
    private $username = 'root';
    private $password = 'root';
    private $connect = null;

    private function __construct()
    {
        try {
            $this->connect = new PDO("mysql:host={$this->host};dbname={$this->dbName};", $this->username, $this->password);
        } catch(PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    }

    public static function getInstance() 
    {
        if (is_null(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnect()
    {
        return $this->connect;
    }

    private function __clone() {}
}