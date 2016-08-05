<?php
require_once "models/Database.php";

class Member extends Database {
    /* @return array */  
    function getActivity($id){
        // 搜尋活動資訊
        $sql = "SELECT * FROM `activity` WHERE `aID` = :id";
        $result = $this->prepare($sql);
        $result->bindParam("id",$id);
        $result->execute();
        
        $row = $result->fetch();
        $showData = array("id"=>$row['aID'],"name"=>$row['aName'],"content"=>$row['aContent'],"persons"=>$row['aPersons'],
                        "bring"=>$row['aBringPersons'],"start"=>$row['aStartTime'],"end"=>$row['aEndTime'],
                        "competence"=>$row['aCompetence'],"limit"=>$row['aLimit'],"remain"=>$row['aRemain']);
        return $showData;
    }
    /* @return int */  
    function getActivityPersons($id){
        // 搜尋活動資訊
        $sql = "SELECT * FROM `activity` WHERE `aID` = :id";
        $result = $this->prepare($sql);
        $result->bindParam("id",$id);
        $result->execute();
        
        $row = $result->fetch();
        return $row['aRemain'];
        
    }
    /* @return int */  
    function getMemberCompetence($mID,$name) {
        // 搜尋員工權限
        $sql = "SELECT `mCompetence` FROM `members` WHERE `mID` = :id AND `mName` = :name";
        $result = $this->prepare($sql);
        $result->bindParam("id",$mID);
        $result->bindParam("name",$name);
        $result->execute();
        
        $row = $result->fetch();
        return $row['mCompetence'];
    }
    /* @return string */  
    function signUpActivity($aID,$mID,$bring,$mCompetence) {
        try {
            $this->transaction();
            
            // 搜尋活動資訊
            $sql = "SELECT * FROM `activity` WHERE `aID` = :id FOR UPDATE";
            $result = $this->prepare($sql);
            $result->bindParam("id",$aID);
            $result->execute();
            
            // 取得剩餘人數、可攜伴人數、限定權限、限制員工、開始時間、截止時間
            $row = $result->fetch();
            $remain = $row['aRemain'];
            $aBring = $row['aBringPersons'];
            $aCompetence = $row['aCompetence'];
            $limit = $row['aLimit'];
            $start = $row['aStartTime'];
            $end = $row['aEndTime'];
            
            // 檢查報名時間
            if (!($this->checkTime($start,$end))) {
                throw new Exception("不在可報名時間");
            }
            // 檢查攜帶人數
            if ($bring > $aBring) {
                throw new Exception("超過攜帶人數");
            }
            // 檢查剩餘人數
            if (($remain < 1) || (($remain - ($bring+1)) < 0)) {
                throw new Exception("超過可報名人數");
            }
            // 檢查限制
            if (($limit != null) || ($limit != "")) {
                $limit = explode(",",$limit);
                if (!in_array($mID,$limit)) {
                    throw new Exception("非可報名員工");
                }
            }
            // 檢查權限
            if ($aCompetence != $mCompetence) {
                throw new Exception("非可報名權限");
            }
            
            // 更新剩餘人數
            $persons = $bring+1;
            $sql = "UPDATE `activity` SET `aRemain` = `aRemain`- :persons WHERE `aID` = :id";
            $sth = $this->prepare($sql);
            $sth->bindParam("id",$aID);
            $sth->bindParam("persons",$persons);
            $sth->execute();
            
            // 新增報名員工
            $sth = null;
            $persons = $bring+1;
            $sql = "INSERT INTO `signUpList`(`aID`,`mID`,`persons`) VALUES (:aID,:mID,:persons)";
            $sth = $this->prepare($sql);
            $sth->bindParam("aID",$aID);
            $sth->bindParam("mID",$mID);
            $sth->bindParam("persons",$persons);
            $sth->execute();
            
            $this->commit();
        }catch(Exception $e) {
            $this->rollBack();
            $error = $e->getMessage();
        }
        
        return $error;
    }
    /* @return bool */
    function checkTime($start,$end) {
        date_default_timezone_set("Asia/Taipei");
        if (((time() - strtotime($start)) < 0) || ((time() - strtotime($end)) > 0)){
            return false;
        }else {
            return true;
        }
    }
}
    
?>