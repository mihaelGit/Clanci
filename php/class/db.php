<?php

class db{
    private $host="localhost";
    private $user="root";
    private $password="";
    private $db="clanci";
    public $conn;
    
     function __construct() {
        $this->conn = new mysqli($this->host,$this->user,$this->password,$this->db);
    }
}
/*
$db = new db();

$test = $db->conn->query("SELECT * FROM users");

while($row = $test->fetch_assoc()){
    print_r($row);
}*/