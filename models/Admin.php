<?php

/**
 * Class Database
 *      資料庫相關方法
 */
require_once 'models/Database.php';

/**
 * 管理者類別
 *      管理者相關方法
 */
class Admin extends Database
{
    /**
     * 比對資料庫中的管理者帳密 進行登入
     *
     * @param string $id 管理者帳號
     * @param string $password 管理者密碼
     * @return bool
     */
    public function login($id, $password)
    {
        // 搜尋並比對資料庫中的管理者資料
        $sql = "SELECT * FROM `admin` " .
        "WHERE `adminID` = :id AND `adminPassword` = :password";
        $result = $this->prepare($sql);
        $result->bindParam('id', $id);
        $result->bindParam('password', $password);
        $result->execute();

        $row = $result->fetch();
        $admin = $row['adminID'] . $row['adminPassword'];

        if ($admin != null) {
            // 將管理者資料存成SESSION
            $_SESSION['admin'] = $admin;

            return true;
        }else {
            return false;
        }
    }

    /**
     * 檢查是否已登入
     *
     * @return bool
     */
    public function checkLogin()
    {
        return isset($_SESSION['admin']);
    }

    /**
     * 登出
     *
     * @return bool
     */
    public function logout()
    {
        // 刪除session
        return session_destroy();
    }

    /**
     * 取得全部員工資料
     *
     * @return array
     */
    public function getMemberList()
    {
        $sql = "SELECT * FROM `members`";
        $result = $this->prepare($sql);
        $result->execute();

        return $showData = $result->fetchAll();
    }

    /**
     * 取得特定員工資料
     *
     * @param string $mID 會員id
     * @return array
     */
    public function getMember($id)
    {
        $sql = "SELECT * FROM `members` WHERE `mID` = :id";
        $result = $this->prepare($sql);
        $result->bindParam('id', $id);
        $result->execute();

        return $showData = $result->fetch();
    }

    /**
     * 新增員工
     *
     * @param string $id 員工id
     * @param string $name 員工名稱
     * @param string $competence 員工權限
     * @return array
     */
    public function newMember($id, $name, $competence)
    {
        $sql = "INSERT INTO `members`(`mID`, `mName`, `mCompetence`) " .
        "VALUES (:id, :name, :competence)";
        $sth = $this->prepare($sql);
        $sth->bindParam('id', $id);
        $sth->bindParam('name', $name);
        $sth->bindParam('competence', $competence);
        return $sth->execute();
    }

    /**
     * 修改員工資料
     *
     * @param string $oldID 舊的會員id
     * @param string $newID 新的會員id
     * @param string $name 會員名稱
     * @param string $competence 會員權限
     * @return bool
     */
    public function modifyMember($oldID, $newID, $name, $competence)
    {
        $sql = "UPDATE `members` SET `mID` = :newID , `mName` = :name ," .
        "`mCompetence` = :competence WHERE `mID` = :oldID";
        $sth = $this->prepare($sql);
        $sth->bindParam('newID', $newID);
        $sth->bindParam('name', $name);
        $sth->bindParam('competence', $competence);
        $sth->bindParam('oldID', $oldID);

        return $sth->execute();
    }

    /**
     * 刪除員工資料
     *
     * @param string $id 會員id
     * @return bool
     */
    public function deleteMember($id)
    {
        $sql = "DELETE FROM `members` WHERE `mID` = :id";
        $sth = $this->prepare($sql);
        $sth->bindParam('id', $id);

        return $sth->execute();
    }

    /**
     * 取得全部活動資料
     *
     * @return array
     */
    public function getActivityList()
    {
        $sql = "SELECT * FROM `activity` ORDER BY `aEndTime`";
        $result = $this->prepare($sql);
        $result->execute();

        return $showData = $result->fetchAll();
    }

    /**
     * 取得特定活動資料
     *
     * @param string $id 活動id
     * @return array
     */
    public function getActivity($id)
    {
        $sql = "SELECT * FROM `activity` WHERE `aID` = :id";
        $result = $this->prepare($sql);
        $result->bindParam('id', $id);
        $result->execute();

        $row = $result->fetch();
        $showData = ['id'=>$row['aID'], 'name'=>$row['aName'],
                    'content'=>$row['aContent'], 'persons'=>$row['aPersons'],
                    'bring'=>$row['aBringPersons'], 'start'=>$row['aStartTime'],
                    'end'=>$row['aEndTime'], 'competence'=>$row['aCompetence'],
                    'limit'=>$row['aLimit']];

        return $showData;
    }

    /**
     * 修改活動(目前沒有使用)
     *
     * @param string $id 活動id
     * @param string $name 活動名稱
     * @param string $content 活動內容
     * @param string $persons 活動限制人數
     * @param string $bring 活動可攜伴人數
     * @param string $start 活動報名開始時間
     * @param string $end 活動報名截止時間
     * @param string $competence 活動限制權限
     * @param string $limit 活動限制員工
     * @return bool
     */
    public function modifyActivity(
        $id,
        $name,
        $content,
        $persons,
        $bring,
        $start,
        $end,
        $competence,
        $limit
    ) {
        $sql = "UPDATE `activity` SET `aName` = :name ," .
        " `aContent` = :content , `aPersons` = :persons ," .
        " `aRemain` = :persons, `aBringPersons` = :bring ," .
        " `aStartTime` = :start , `aEndTime` = :end ," .
        " `aCompetence` = :competence ,`aLimit` = :limit WHERE `aID` = :id";
        $sth = $this->prepare($sql);
        $sth->bindParam('id', $id);
        $sth->bindParam('name', $name);
        $sth->bindParam('content', $content);
        $sth->bindParam('persons', $persons);
        $sth->bindParam('bring', $bring);
        $sth->bindParam('start', $start);
        $sth->bindParam('end', $end);
        $sth->bindParam('competence', $competence);
        $sth->bindParam('limit', $limit);

        return $sth->execute();
    }

    /**
     * 刪除活動
     *
     * @param string $id 活動id
     * @return string|null
     */
    public function deleteActivity($id)
    {
        try {
            $this->transaction();
            $sql = "DELETE FROM `activity` WHERE `aID` = :id";
            $sth = $this->prepare($sql);
            $sth->bindParam('id',$id);

            if (!$sth->execute()) {
                throw new Exception('刪除失敗');
            }

            $sql = "DELETE FROM `signUpList` WHERE `aID` = :id";
            $sth = $this->prepare($sql);
            $sth->bindParam('id',$id);

            if (!$sth->execute()) {
                throw new Exception('刪除失敗');
            }

            $this->commit();
        }catch(Exception $e) {
            $this->rollBack();
            $error = $e->getMessage();

            return $error;
        }
    }

    /**
     * 新增活動
     *
     * @param string $name 活動名稱
     * @param string $content 活動內容
     * @param string $persons 活動限制人數
     * @param string $bring 活動可攜伴人數
     * @param string $start  報名開始時間
     * @param string $end 活動報名截止時間
     * @param string $competence 活動限制權限
     * @param string $limit 活動限制員工
     * @return bool
     */
    public function newActivity(
        $name,
        $content,
        $persons,
        $bring,
        $start,
        $end,
        $competence,
        $limit
    ) {
        $sql = "INSERT INTO `activity`(`aID`, `aName`, `aContent`," .
        " `aPersons`, `aRemain`, `aBringPersons`, `aStartTime`, `aEndTime`," .
        " `aCompetence`, `aLimit`) VALUES ((RAND()*1000000), :name," .
        " :content, :persons, :persons, :bring, :start, :end," .
        " :competence, :limit)";
        $sth = $this->prepare($sql);
        $sth->bindParam('name', $name);
        $sth->bindParam('content', $content);
        $sth->bindParam('persons', $persons);
        $sth->bindParam('bring', $bring);
        $sth->bindParam('start', $start);
        $sth->bindParam('end', $end);
        $sth->bindParam('competence', $competence);
        $sth->bindParam('limit', $limit);

        return $sth->execute();
    }

    /**
     * 取得活動參加員工
     *
     * @param string $aID 活動id
     * @return array
     */
    public function getSignUpList($aID)
    {
        $sql = "SELECT `activity`.`aName`, `members`.`mID`," .
        " `members`.`mName`, `signUpList`.`persons` FROM `signUpList` " .
        "INNER JOIN `activity` INNER JOIN `members` " .
        "ON `signUpList`.`aID` = :aID AND `activity`.`aID` = :aID " .
        "AND `signUpList`.`mID` = `members`.`mID`";
        $result = $this->prepare($sql);
        $result->bindParam('aID', $aID);
        $result->execute();

        return $showData = $result->fetchAll();
    }
}
