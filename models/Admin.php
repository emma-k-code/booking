<?php
require_once "models/Database.php";

class Admin extends Database {
    /* @return string */  
    function login($id,$password) {
        // 搜尋並比對資料庫中的管理者資料
        $sql = "SELECT * FROM `admin` WHERE `adminID` = :id AND `adminPassword` = :password";
        $result = $this->prepare($sql);
        
        $result->bindParam('id',$id);
        $result->bindParam('password',$password);
        $result->execute();
        
        $row = $result->fetch();
        $admin = $row['adminID'].$row['adminPassword'];
        
        if ($admin != null) {
            // 將管理者資料存成SESSION
            $_SESSION['admin'] = $admin;
            return true;
        }else {
            return false;
        }
        
    }
    /* @return bool */  
    function checkLogin() {
        return isset($_SESSION['admin']);
    }
    function logout() {
        // 刪除session
        session_destroy();
    }
    /* @return array */  
    function getMemberList(){
        $sql = "SELECT * FROM `members`";
        $result = $this->prepare($sql);
        $result->execute();
        
        return $showData = $result->fetchAll();
    }
    /* @return array */  
    function getMember($id){
        $sql = "SELECT * FROM `members` WHERE `mID` = :id";
        $result = $this->prepare($sql);
        $result->bindParam("id",$id);
        $result->execute();
        
        return $showData = $result->fetch();
    }
    /* @return bool */  
    function modifyMember($oldID,$newID,$name,$competence){
        $sql = "UPDATE `members` SET `mID` = :newID , `mName` = :name ,`mCompetence` = :competence WHERE `mID` = :oldID";
        $sth = $this->prepare($sql);
        $sth->bindParam("newID",$newID);
        $sth->bindParam("name",$name);
        $sth->bindParam("competence",$competence);
        $sth->bindParam("oldID",$oldID);
        return $sth->execute();
    }
    /* @return array(array()) */  
    function getActivityList(){
        $sql = "SELECT * FROM `activity`";
        $result = $this->prepare($sql);
        $result->execute();
        
        return $showData = $result->fetchAll();
    }
    /* @return array */  
    function getActivity($id){
        $sql = "SELECT * FROM `activity` WHERE `aID` = :id";
        $result = $this->prepare($sql);
        $result->bindParam("id",$id);
        $result->execute();
        
        $row = $result->fetch();
        $showData = array("id"=>$row['aID'],"name"=>$row['aName'],"content"=>$row['aContent'],
                    "persons"=>$row['aPersons'],"bring"=>$row['aBringPersons'],
                    "start"=>$row['aStartTime'],"end"=>$row['aEndTime'],"competence"=>$row['aCompetence'],
                    "limit"=>$row['aLimit']);
    
        
        return $showData;
    }
    /* @return bool */  
    function modifyActivity($id,$name,$content,$persons,$bring,$start,$end,$competence,$limit){
        $sql = "UPDATE `activity` SET `aName` = :name , `aContent` = :content ,`aPersons` = :persons ,`aRemain` = :persons,`aBringPersons` = :bring ,
                `aStartTime` = :start ,`aEndTime` = :end ,`aCompetence` = :competence ,`aLimit` = :limit WHERE `aID` = :id";
        $sth = $this->prepare($sql);
        $sth->bindParam("id",$id);
        $sth->bindParam("name",$name);
        $sth->bindParam("content",$content);
        $sth->bindParam("persons",$persons);
        $sth->bindParam("bring",$bring);
        $sth->bindParam("start",$start);
        $sth->bindParam("end",$end);
        $sth->bindParam("competence",$competence);
        $sth->bindParam("limit",$limit);
        return $sth->execute();
    }
    /* @return bool */  
    function deleteActivity($id){
        try {
            $this->transaction();
            $sql = "DELETE FROM `activity` WHERE `aID` = :id";
            $sth = $this->prepare($sql);
            $sth->bindParam("id",$id);
            $sth->execute();
            
            $sql = "DELETE FROM `signUpList` WHERE `aID` = :id";
            $sth = $this->prepare($sql);
            $sth->bindParam("id",$id);
            $sth->execute();
            
            $this->commit();
        }catch(Exception $e) {
            
        }
        
    }
    /* @return bool */  
    function newActivity($name,$content,$persons,$bring,$start,$end,$competence,$limit){
        $sql = "INSERT INTO `activity`(`aID`,`aName`,`aContent`,`aPersons`,`aRemain`,`aBringPersons`,`aStartTime`,`aEndTime`,`aCompetence`,`aLimit`) VALUES ((RAND()*1000000),:name,:content,:persons,:persons,:bring,:start,:end,:competence,:limit)";
        $sth = $this->prepare($sql);
        $sth->bindParam("name",$name);
        $sth->bindParam("content",$content);
        $sth->bindParam("persons",$persons);
        $sth->bindParam("bring",$bring);
        $sth->bindParam("start",$start);
        $sth->bindParam("end",$end);
        $sth->bindParam("competence",$competence);
        $sth->bindParam("limit",$limit);
        
        return $sth->execute();
    }
    /* @return array */  
    function getSignUpList($aID){
        $sql = "SELECT `activity`.`aName`,`members`.`mID`,`members`.`mName`,`signUpList`.`persons` FROM `signUpList` INNER JOIN `activity` INNER JOIN `members` ON `signUpList`.`aID` = :aID AND `activity`.`aID` = :aID AND `signUpList`.`mID` = `members`.`mID`;";
        $result = $this->prepare($sql);
        $result->bindParam("aID",$aID);
        $result->execute();
        
        return $showData = $result->fetchAll();
    }
    /* @return bool */  
    function newMember($id,$name,$competence){
        $sql = "INSERT INTO `members`(`mID`,`mName`,`mCompetence`) VALUES (:id,:name,:competence)";
        $sth = $this->prepare($sql);
        $sth->bindParam("id",$id);
        $sth->bindParam("name",$name);
        $sth->bindParam("competence",$competence);
        return $sth->execute();
    }
}
?>