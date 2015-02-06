<?php
/*******************************************************/
/* Klasa za rad s userima                              
   Login primjer u php/login.php                       */
/*******************************************************/
class users{
    
    private $conn;
    private $id;
    private $username;
    private $mail;
    private $firstName;
    private $lastName;
    private $role;
    private $valid;
    
    function __construct(mysqli $conn){   
        $this->conn = $conn;
    }
    /******************************************************************************/
    /* funkcija dobiva username i pass stvara (ili ne ako je krivo) sesiju usera  */
    /******************************************************************************/
    function login($username, $password){
        
        $queryString = "SELECT id, username, mail, firstName, lastName, role "
                . "FROM users "
                . "WHERE username = '".$username."' AND password = SHA1('".$password."') LIMIT 1;";
        
        $data = $this->conn->query($queryString);
        
        if($data->num_rows == 1){
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
    
    /**********************************************************************/
    /* funkcija vraca TRUE ako je korisnik unio ispravne podatke za login */
    /**********************************************************************/
    public function isValid(){
        return $this->valid;
    }
    
    /*******************************************************/
    /* funkcija stvara sesiju                              */
    /*******************************************************/
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
    
    /*******************************************************/
    /* funkcija stvara listu korisnika ADMIN               */
    /*******************************************************/
    public function getAllUsers(){
       $query = "SELECT id, firstName, lastName, username, mail, role FROM users";
        
        $rows = $this->conn->query($query);
        
        $data = array();
        
        if($rows->num_rows > 0){
            while($row = $rows->fetch_assoc()){
                $data[]=$row;
            }
            return $data;
        }
        else{
            return $data;
        }
    }
    
    /*****************************************************************/
    /* funkcija stvara listu korisnika za promote u recenzenta ADMIN */
    /*****************************************************************/
    public function getUsersForPromote(){
       $query = "SELECT id, firstName, lastName, username, mail FROM users WHERE role = 2";
        
        $rows = $this->conn->query($query);
        
        $data = array();
        
        if($rows->num_rows > 0){
            while($row = $rows->fetch_assoc()){
                $data[]=$row;
            }
            return $data;
        }
        else{
            return $data;
        }
    }
    
    /******************************************************************/
    /* funkcija stvara listu recenzenata za odabranu kategoriju ADMIN */
    /******************************************************************/
    public function getReviewers($category_id){
       $query = "SELECT CONCAT(firstName, ' ', lastName) AS name, users.id AS user_id "
               . "FROM users "
               . "RIGHT JOIN reviewer_category ON users.id = reviewer_category.user_ID "
               . "WHERE reviewer_category.category_ID = $category_id ";
       
        $rows = $this->conn->query($query);
        
        $data = array();
        
        if($rows->num_rows > 0){
            while($row = $rows->fetch_assoc()){
                $data[]=$row;
            }
            return $data;
        }
        else{
            return $data;
        }
    }
}
