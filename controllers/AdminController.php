<?php
class AdminController extends Controller {
    private $checkLogin;
    
    function __construct() {
        $admin = $this->model("Admin");
        // 判斷是否有登入
        $this->checkLogin = $admin->checkLogin();
    }
    
    function index() {
        if (!($this->checkLogin)) {
            header("location: Admin/login");
            return;
        }else {
            header("location: Admin/activity");
            return;
        }
    }
    
    function login() {
        
        if ($this->checkLogin) {
            header("location: activity");
            return;
        }
        
        // 如果按下登入按鈕
        if (isset($_POST['bLogin'])) {
            // 接收的登入資料
            $id = addslashes($_POST['username']);
            $password = addslashes($_POST["password"]);
            
            $admin = $this->model("Admin");
            // 判斷登入成功與否
            $checkLogin = $admin->login($id,$password);
            
            // 登入成功進入首頁
            if ($checkLogin=="OK") {
                header("location: activity");
                return;
            }
            
        }
        $this->view("admin/login",$checkLogin);
    }
    
    function newActivity() {
        if (!($this->checkLogin)) {
            header("location: login");
            return;
        }
        
        if (isset($_POST["submit"])) {
            $name = addslashes($_POST["activityName"]);
            $content = addslashes($_POST["activityContent"]);
            $persons = addslashes($_POST["activityPersons"]);
            $bring = addslashes($_POST["activityBring"]);
            $start = addslashes($_POST["activityStart"]);
            $end = addslashes($_POST["activityEnd"]);
            $competence = addslashes($_POST["activityCompetence"]);
            $limit = addslashes($_POST["activityLimit"]);
            
            $setData = $this->model("Admin");
            $result = $setData->newActivity($name,$content,$persons,$bring,$start,$end,$competence,$limit);
            
            if ($result) {
                $result="新增成功";
            }else {
                $result="新增失敗";
            }
        }
        $this->view("admin/admin",array("newActivity",$result));
    }
    
    function newMember() {
        if (!($this->checkLogin)) {
            header("location: login");
            return;
        }
        
        if (isset($_POST["submit"])) {
            $id = addslashes($_POST["memberID"]);
            $name = addslashes($_POST["memberName"]);
            $competence = addslashes($_POST["memberCompetence"]);
            
            $setData = $this->model("Admin");
            $result = $setData->newMember($id,$name,$competence);
            
            if ($result) {
                $result="新增成功";
            }else {
                $result="新增失敗";
            }
        }
        $this->view("admin/admin",array("newMember",$result));
    }
    
    function activity() {
        if (!($this->checkLogin)) {
            header("location: login");
            return;
        }
        
        if (isset($_POST["submit"])) {
            $id = addslashes($_POST["submit"]);
            $name = addslashes($_POST["activityName"]);
            $content = addslashes($_POST["activityContent"]);
            $persons = addslashes($_POST["activityPersons"]);
            $bring = addslashes($_POST["activityBring"]);
            $start = addslashes($_POST["activityStart"]);
            $end = addslashes($_POST["activityEnd"]);
            $competence = addslashes($_POST["activityCompetence"]);
            $limit = addslashes($_POST["activityLimit"]);
            
            $setData = $this->model("Admin");
            $result = $setData->modifyActivity($id,$name,$content,$persons,$bring,$start,$end,$competence,$limit);
            
            if ($result) {
                $result="修改成功";
            }else {
                $result="修改失敗";
            }
        }
        
        $getData = $this->model("Admin");
        $activity = $getData->getActivityList();
        $this->view("admin/admin",array("activityTable",$activity));
    }
    
    function member() {
        if (!($this->checkLogin)) {
            header("location: login");
            return;
        }
        
        $getData = $this->model("Admin");
        $member = $getData->getMemberList();
        $this->view("admin/admin",array("memberTable",$member));
    }
    
    function logout() {
        $admin = $this->model("Admin");
        $checkLogin = $admin->logout();
        header("location: login");
    }
    
    function getActivity($id) {
        $id = addslashes($id);
        $admin = $this->model("Admin");
        $getActivity = $admin->getActivity($id);
        $this->view("admin/activityContent",$getActivity);
    }
}
?>