<?php

class DbConnection
{
    public $host;
    public $user;
    public $password;
    public $databaseName;
    public $activeConnection;

    public function __construct($host, $user, $password, $databaseName)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->databaseName = $databaseName;
        $this->activeConnection = new mysqli($this->host, $this->user, $this->password, $this->databaseName);
    }

    /**
     * Get an active mysql connection
     */
    public function getMySQLConnection()
    {
        if (!$this->activeConnection) {
            $this->activeConnection = new mysqli($this->host, $this->user, $this->password, $this->databaseName);
        }
        if ($this->activeConnection->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->activeConnection->connect_error;
            exit();
        }
        return $this->activeConnection;
    }
}



$db = new DbConnection('127.0.0.1', 'root', '', 'news_proyect');
$query = "SELECT * FROM users";
$result = $db->getMySQLConnection()->query($query);
print_r($result->fetch_all());