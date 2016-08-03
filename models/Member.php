<?php
require_once "models/Database.php";

class Member extends Database {
    /* @return array */  
    function getActivity($id){
        $sql = "SELECT * FROM `activity` WHERE `aID` = :id";
        $result = $this->prepare($sql);
        $result->bindParam("id",$id);
        $result->execute();
        
        // 搜尋結果為0
        if ( $result->rowCount() == 0) {
            return array();
        }
        
        // 處理查詢結果
        while ($row = $result->fetch()) {
             $showData = array("name"=>$row['aName'],"content"=>$row['aContent'],"persons"=>$row['aPersons'],
                        "bring"=>$row['aBringPersons'],"start"=>$row['aStartTime'],"end"=>$row['aEndTime'],
                        "competence"=>$row['aCompetence'],"limit"=>$row['aLimit']);
        }
        
        return $showData;
    }
}
    
?>