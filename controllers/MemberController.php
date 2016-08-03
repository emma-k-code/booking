<?php
class MemberController extends Controller {
    function index() {
        
    }
    
    function activity($id) {
        $id = addslashes($id);
        $getData = $this->model("Member");
        $activity = $getData->getActivity($id);
        
        $start = new DateTime($activity["start"]);
        $end = new DateTime($activity["end"]);
        $now = new DateTime(date("Y-m-d h:i:s"));
        
        // 有bug
        if ($now > $start){
            $activity = "尚未開始" ;
        }elseif($now > $end) {
            $activity = "已經截止" ;
        }
        
        $this->view("member/activity",$activity);
    }
}
?>