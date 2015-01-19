<?php
class user{
    
    private $id;
    private $username;
    private $firstName;
    private $lastName;
    private $role;
    
    private $valid;
    
    function __construct($username, $password, mysqli $conn){
        
        $queryString = "SELECT id, username, firstName, lastName, role "
                . "FROM users "
                . "WHERE username = '".$username."' AND password = SHA1('".$password."') LIMIT 1;";
        
        $data = $conn->query($queryString);
        
        if($conn->affected_rows == 1){
            $row = $data->fetch_assoc();
            $this->id = $row["id"];
            $this->username = $row["username"];
            $this->firstName = $row["firstName"];
            $this->lastName = $row["lastName"];
            $this->role = $row["role"];
            $this->valid = true;
        }
        else{
            $this->valid = false;
        }
    }
    
    public function isValid(){
        return $this->valid;
    }
    
    public function sessinData(){
        $sessinData = array(
            "id" => $this->id,
            "username" => $this->username,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "role" => $this->role
        );
        
        return $sessinData;
    }
}
