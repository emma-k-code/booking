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
             $showData = array("id"=>$row['aID'],"name"=>$row['aName'],"content"=>$row['aContent'],"persons"=>$row['aPersons'],
                        "bring"=>$row['aBringPersons'],"start"=>$row['aStartTime'],"end"=>$row['aEndTime'],
                        "competence"=>$row['aCompetence'],"limit"=>$row['aLimit'],"remain"=>$row['aRemain']);
        }
        
        return $showData;
    }
    
    /* @return int */  
    function chekcMember($mID,$name) {
        $sql = "SELECT * FROM `members` WHERE `mID` = :id AND `mName` = :name";
        $result = $this->prepare($sql);
        $result->bindParam("id",$mID);
        $result->bindParam("name",$name);
        $result->execute();
        
        // 搜尋結果為0
        if ( $result->rowCount() == 0) {
            return 0;
        }
        
        // 處理查詢結果
        while ($row = $result->fetch()) {
             return $row['mCompetence'];
        }
    }
    
    /* @return bool */  
    function signUpActivity($aID,$mID,$bring,$mCompetence) {
        $sql = "SELECT * FROM `activity` WHERE `aID` = :id ";
        $result = $this->prepare($sql);
        $result->bindParam("id",$aID);
        $result->execute();
        
        // 處理查詢結果
        while ($row = $result->fetch()) {
             $remain = $row['aRemain'];
             $aBring = $row['aBringPersons'];
             $aCompetence = $row['aCompetence'];
             $limit = $row['aLimit'];
        }
        
        // 檢查攜帶人數
        if ($bring > $aBring) {
            return false;
        }
        // 檢查剩餘人數
        if (($remain < 1) || (($remain - ($bring+1)) < 0)) {
            return false;
        }
        // 檢查限制
        if (($limit != null) || ($limit != "")) {
            $limit = explode(",",$limit);
            if (array_search($mID,$limit) == null) {
                return false;
            }
        }
        // 檢查權限
        if ($aCompetence != $mCompetence) {
            return false;
        }
        
        // 更新剩餘人數
        $remain = $remain - ($bring+1);
        
        $sql = "UPDATE `activity` SET `aRemain` = :remain WHERE `aID` = :id";
        $sth = $this->prepare($sql);
        $sth->bindParam("id",$aID);
        $sth->bindParam("remain",$remain);
        $sth->execute();
        
        // 新增報名人員
        $sth = null;
        $persons = $bring+1;
        $sql = "INSERT INTO `signUpList`(`aID`,`mID`,`persons`) VALUES (:aID,:mID,:persons)";
        $sth = $this->prepare($sql);
        $sth->bindParam("aID",$aID);
        $sth->bindParam("mID",$mID);
        $sth->bindParam("persons",$persons);
        return $sth->execute();
    }
}
    
?>