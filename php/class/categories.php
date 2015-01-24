<?php
class categories{
    
    private $categories = array();
    
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
    
    public function getSelectList(){
        return $this->categories;
    }
}
