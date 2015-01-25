<?php
/*********************************************/
/* Klasa za dobiti moguce kategorije iz baze */
/*********************************************/
class categories{
    
    private $categories = array();
    
    /*******************************************************/
    /* funkcija dobiva mysqli link i stavra niz kategorija */
    /*******************************************************/
    function __construct(mysqli $conn){
        
        $queryString = "SELECT * FROM categories;";
        
        $data = $conn->query($queryString);
        
        if($conn->affected_rows >= 1){
            while($row = $data->fetch_assoc()){
                $id_category = array(
                    "id" => $row["id"],
                    "categoryName" => $row["categoryName"]
                );
                $this->categories[] = $id_category;
            }
        }
    }
    /*******************************************************/
    /* funkcija vraca dvodimenzionalni array id / category */
    /*******************************************************/
    public function getSelectList(){
        return $this->categories;
    }
}
