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
    /**************************************/
    /* funkcija koja vraca autorove
       clanke na recenziji                */
    /**************************************/
    function getArticlesUnderReview($user_ID){
        
        $query = "SELECT title, submitTime, filePath FROM articles WHERE user_ID = $user_ID AND status IN (1,2)";
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
    /**************************************/
    /* funkcija koja vraca sve clanke za 
       recenziju ADMIN                    */
    /**************************************/
    function getArticlesForReview(){
        
        $query = "SELECT CONCAT(firstName, ' ', lastName) AS name , title, categoryName, articles.id "
                . "FROM articles "
                . "INNER JOIN users ON articles.user_ID = users.id "
                . "INNER JOIN categories ON articles.category_ID = categories.id "
                . "WHERE status = 1";
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
    /**************************************/
    /* funkcija koja vraca sve clanke u 
       bazi za admina                     */
    /**************************************/
    function getAllArticles(){
        
        $query = "SELECT CONCAT(firstName, ' ', lastName) AS name , title, categoryName, filePath, status, articles.id "
                . "FROM articles "
                . "INNER JOIN users ON articles.user_ID = users.id "
                . "INNER JOIN categories ON articles.category_ID = categories.id ";
        
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
    
    /**************************************/
    /* funkcija za slanje clanka 
       recenzentu                         */
    /**************************************/
    function getArticle($id){
        
        $query = "SELECT CONCAT(firstName, ' ', lastName) AS name , title, categoryName, summary, filePath, articles.id AS articles_id, categories.id AS categories_id  "
                . "FROM articles "
                . "INNER JOIN users ON articles.user_ID = users.id "
                . "INNER JOIN categories ON articles.category_ID = categories.id "
                . "WHERE articles.id = $id";
        
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
    
    /**************************************/
    /* funkcija za dodjelu clanka 
       recenzentu                         */
    /**************************************/
    function assignReviewer($articleID, $userID){
        
        $query = "INSERT INTO article_reviewer (article_ID, user_ID) VALUES ($articleID, $userID) ";
        if($this->conn->query($query) === TRUE){
           return TRUE;
        }
        else{
           return FALSE;
        }  
        
    }
    
    /**************************************/
    /* funkcija za izmjenu stanja         */
    /**************************************/
    function statusUpdate($articleID, $status){
        
        $query = "UPDATE articles SET status = $status WHERE id = $articleID ";
        if($this->conn->query($query) === TRUE){
           return TRUE;
        }
        else{
           return FALSE;
        }  
        
    }
    
    /**************************************/
    /* funkcija povlaci clanke dodjeljene
       recenzentu                         */
    /**************************************/
    function articlesForReviewer($userID){
        
       $query = "SELECT title, filePath, summary, articles.id AS articles_id "
               . "FROM articles "
               . "INNER JOIN article_reviewer ON articles.id = article_reviewer.article_ID "
               . "WHERE article_reviewer.user_ID = 4";
        
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
