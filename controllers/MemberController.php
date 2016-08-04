<?php
class MemberController extends Controller {
    function index() {
        
    }
    
    function activity($id) {
        $getData = $this->model("Member");
        // 如果按下報名按鈕
        if (isset($_POST["submit"])) {
            $aID = addslashes($_POST["activityID"]);
            $mID = addslashes($_POST["memberID"]);
            $name = addslashes($_POST["memberName"]);
            $bring= addslashes($_POST["memberBring"]);
            
            $competence = $getData->chekcMember($mID,$name);
            
            if ($competence > 0) {
                $signUp = $getData->signUpActivity($aID,$mID,$bring,$competence);
            }
            
            if ($signUp) {
                $output = "加入成功";
            }else {
                $output = "加入失敗";
            }
            
        }else {
            $output = $getData->getActivity($id);
        
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
}
?>