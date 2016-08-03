<?php
class MemberController extends Controller {
    function index() {
        
    }
    
    function activity($id) {
        $id = addslashes($id);
        $getData = $this->model("Member");
        $activity = $getData->getActivity($id);
        
        $this->view("member/activity",$activity);
    }
}
?>