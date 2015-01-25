<?php
/****************************/
/* Klasa za rad s artiklima */
/****************************/
class article{
    
    private $conn;
    
    /******************************/
    /* konstruktor dobiva mysqli 
       za rad s bazom, poslati 
       preko class/db.php objekta */
    /******************************/
    function __construct(mysqli $conn) {
        $this->conn = $conn;
    }
    
    /**************************************/
    /* funkcija za submit clanka u bazu
       vraca TRUE/FALSE ovisno o uspjehu 
       queryja                            */
    /**************************************/
    function submitArticle($user_ID, $category_ID, $title, $summary, $filePath, $status){
        
        $query = "INSERT INTO articles (user_ID, category_ID, title, summary, filePath, status) "
                . "VALUES($user_ID, $category_ID, '$title', '$summary', '$filePath', $status)";
        
        if($this->conn->query($query) === TRUE){
           return TRUE;
        }
        else{
           return FALSE;
        }  
    }
}