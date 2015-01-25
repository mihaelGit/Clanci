<?php
/***********************************/
/* Klasa za bazu 
   $conn koristiti kao mysqli link */
/***********************************/
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
