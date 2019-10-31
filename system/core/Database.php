<?php

namespace System\Core;

use PDO;

class Database {
    private $driver = 'mysql';
    private $host = 'localhost';
    private $dbname = 'hidroparts';
    private $user = 'root';
    private $password = '';

    public function __construct(){
        $this->connect();
    }

    public function connect(){
        $connection = new PDO("$this->driver:host=$this->host; dbname=$this->dbname", $this->user, $this->password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // echo 'Conexion exitosa';
        return $connection;
    }
}