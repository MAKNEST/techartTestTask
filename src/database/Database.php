<?php

class Database
{
    private static $instance = null;

    private $dbConfigPath = __DIR__ . "/dbconfig.php";

    private $HOST = null;
    private $DB_NAME = null;
    private $PORT = null;
    private $USER_NAME = null;
    private $PASSWORD = null;

    private $connect = null;

    private function __construct()
    {
        try {
            if (!file_exists($this->dbConfigPath)) {
                throw new Exception("Can`t open file " . $this->dbConfigPath, 1);
            }

            require_once $this->dbConfigPath;
        
            $this->HOST = HOST;
            $this->DB_NAME = DB_NAME;
            $this->PORT = PORT;
            $this->USER_NAME = USER_NAME;
            $this->PASSWORD = PASSWORD;
        } 
        catch(Exception $e) {
            die("Database error: " . $e->getMessage());
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
        if(is_null($this->connect)) {
            try{
                $this->connect = new PDO("mysql:host={$this->HOST};dbname={$this->DB_NAME};port={$this->PORT};charset=utf8mb4", $this->USER_NAME, $this->PASSWORD);
            } catch (PDOException $e) {
                die("Database connect error: " . $e->getMessage());
            }
        }
        return $this->connect;
    }

    private function __clone() {}
}