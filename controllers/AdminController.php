<?php
class AdminController extends Controller {
    function index() {
        $admin = $this->model("Admin");
        // 判斷是否有登入
        $checkLogin = $admin->checkLogin();
        
        if ($checkLogin) {
            header("location: Admin/admin");
            return;
        }else {
            header("location: Admin/login");
            return;
        }
    }
    
    function login() {
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
                header("location: admin");
                return;
            }
            
        }
        $this->view("admin/login",$checkLogin);
    }
    
    function admin() {
        $this->view("admin/admin",array("activityTable",$members));
    }
    
    function newActivity() {
        $this->view("admin/admin",array("newActivity",array()));
    }
    
    function activity() {
        $getData = $this->model("Admin");
        $activity = $getData->getActivityList();
        $this->view("admin/admin",array("activityTable",array()));
    }
    
    function member() {
        $getData = $this->model("Admin");
        $member = $getData->getMemberList();
        $this->view("admin/admin",array("memberTable",$member));
    }
    
    function logout() {
        $admin = $this->model("Admin");
        $checkLogin = $admin->logout();
        header("location: login");
    }
}
?>