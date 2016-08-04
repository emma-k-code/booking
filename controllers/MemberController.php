<?php
class MemberController extends Controller {
    function index() {
        
    }
    
    function activity($id) {
        $id = addslashes($id);
        $getData = $this->model("Member");
        $activity = $getData->getActivity($id);
        
        $start = $activity["start"];
        $end =$activity["end"];
        
        if ((time() - strtotime($start)) < 0){
            $activity = "尚未開始" ;
        }elseif((time() - strtotime($end)) > 0) {
            $activity = "已經截止" ;
        }
        
        $this->view("member/activity",$activity);
    }
}
?>