<?php
class user{
    
    private $id;
    private $username;
    private $mail;
    private $firstName;
    private $lastName;
    private $role;
    
    private $valid;
    
    function __construct($username, $password, mysqli $conn){
        
        $queryString = "SELECT id, username, mail, firstName, lastName, role "
                . "FROM users "
                . "WHERE username = '".$username."' AND password = SHA1('".$password."') LIMIT 1;";
        
        $data = $conn->query($queryString);
        
        if($conn->affected_rows == 1){
            $row = $data->fetch_assoc();
            $this->id = $row["id"];
            $this->username = $row["username"];
            $this->mail = $row["mail"];
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
    
    public function sessionData(){
        $sessionData = array(
            "id" => $this->id,
            "username" => $this->username,
            "mail" => $this->mail,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "role" => $this->role
        );
        
        return $sessionData;
    }
}
