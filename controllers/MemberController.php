<?php
class MemberController extends Controller {
    function index() {
        
    }
    
    function activity($id) {
        $getData = $this->model("Member");
        
        if (isset($_POST["submit"])) {
            // 按下報名按鈕
            $aID = addslashes($_POST["activityID"]); // 活動ID
            $mID = addslashes($_POST["memberID"]);  // 員工ID
            $name = addslashes($_POST["memberName"]); // 員工名稱
            $bring= addslashes($_POST["memberBring"]); // 攜伴人數
            
            // 員工權限
            $competence = $getData->getMemberCompetence($mID,$name);
            
            if ($competence > 0) {
                $signUp = $getData->signUpActivity($aID,$mID,$bring,$competence);
                if ($signUp == null) {
                    $output = "加入成功";
                }else {
                    $output = $signUp;
                }
            }else {
                $output = "編號或名稱不正確";
            }
        }else {
            // 顯示活動資訊
            $output = $getData->getActivity($id);
            
            // 檢查活動日期
            $start = $output["start"];
            $end =$output["end"];
            
            date_default_timezone_set("Asia/Taipei");
            if ((time() - strtotime($start)) < 0){
                $output = "尚未開始" ;
            }elseif((time() - strtotime($end)) > 0) {
                $output = "已經截止" ;
            }
        }
        
        $this->view("member/activity",$output);
    }
    
    function getActivityPersons($id) {
        $getData = $this->model("Member");
        $remain = $getData->getActivityPersons(addslashes($id));
        $this->view("member/showData",$remain);
    }
}
?>