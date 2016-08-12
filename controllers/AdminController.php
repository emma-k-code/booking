<?php

class AdminController extends Controller
{
    private $checkLogin;

    public function __construct()
    {
        // 判斷是否有登入
        $this->checkLogin = $this->model('Admin')->checkLogin();
    }

    public function index()
    {
        // 判斷是否有登入
        if (!($this->checkLogin)) {
            header('location: Admin/login');
            exit;
        } else {
            header('location: Admin/activity');
            exit;
        }
    }

    public function login()
    {
        // 判斷是否有登入
        if ($this->checkLogin) {
            header('location: activity');
            exit;
        }

        // 如果按下登入按鈕
        if (isset($_POST['bLogin'])) {
            // 接收的登入資料
            $id = addslashes($_POST['username']);
            $password = addslashes($_POST['password']);

            $admin = $this->model('Admin');
            // 判斷登入成功與否
            $checkLogin = $admin->login($id, $password);

            // 登入成功進入管理者頁面
            if ($checkLogin) {
                header('location: activity');

                return;
            }else {
                $checkLogin = '輸入帳號或密碼錯誤';
            }

        }

        $this->view('admin/login', $checkLogin);
    }

    public function newActivity()
    {
        // 判斷是否有登入
        if (!($this->checkLogin)) {
            header('location: login');
            exit;
        }

        // 如果有送出資料(新增)
        if (isset($_POST['submit'])) {
            $name = addslashes($_POST['activityName']);
            $content = addslashes($_POST['activityContent']);
            $persons = addslashes($_POST['activityPersons']);
            $bring = addslashes($_POST['activityBring']);
            $start = addslashes($_POST['activityStart']);
            $end = addslashes($_POST['activityEnd']);
            $competence = addslashes($_POST['activityCompetence']);
            $limit = addslashes($_POST['activityLimit']);

            $result = $this->model('Admin')->newActivity(
                                                $name,
                                                $content,
                                                $persons,
                                                $bring,
                                                $start,
                                                $end,
                                                $competence,
                                                $limit
                                            );

            if ($result) {
                $result = '新增成功';
            }else {
                $result = '新增失敗';
            }
        }

        $this->view('admin/admin', ['newActivity', $result]);
    }

    public function newMember()
    {
        // 判斷是否有登入
        if (!($this->checkLogin)) {
            header('location: login');
            exit;
        }

        // 如果有送出資料(新增)
        if (isset($_POST['submit'])) {
            $id = addslashes($_POST['memberID']);
            $name = addslashes($_POST['memberName']);
            $competence = addslashes($_POST['memberCompetence']);

            $result = $this->model('Admin')->newMember($id, $name, $competence);

            if ($result) {
                $result = '新增成功';
            }else {
                $result = '新增失敗';
            }
        }

        $this->view('admin/admin', ['newMember', $result]);
    }

    public function activity()
    {
        // 判斷是否有登入
        if (!($this->checkLogin)) {
            header('location: login');
            exit;
        }

        $activityData = $this->model('Admin');

        // 如果有送出資料(刪除)
        if (isset($_POST['submit'])) {
            $id = addslashes($_POST['submit']);
            $name = addslashes($_POST['activityName']);
            $content = addslashes($_POST['activityContent']);
            $persons = addslashes($_POST['activityPersons']);
            $bring = addslashes($_POST['activityBring']);
            $start = addslashes($_POST['activityStart']);
            $end = addslashes($_POST['activityEnd']);
            $competence = addslashes($_POST['activityCompetence']);
            $limit = addslashes($_POST['activityLimit']);

            $result = $activityData->deleteActivity($id);
        }

        $activityList = $activityData->getActivityList();
        $this->view('admin/admin', ['activityTable', $activityList, $result]);
    }

    public function member()
    {
        // 判斷是否有登入
        if (!($this->checkLogin)) {
            header('location: login');
            exit;
        }

        $memberData = $this->model('Admin');

        // 如果有送出資料(修改)
        if (isset($_POST['submit'])) {
            $oldID = $_POST['submit'];
            $newID = addslashes($_POST['memberID']);
            $name = addslashes($_POST['memberName']);
            $competence = addslashes($_POST['memberCompetence']);

            $result = $memberData->modifyMember($oldID,
                                        $newID,
                                        $name,
                                        $competence
                                    );

            if ($result) {
                $result = '修改成功';
            }else {
                $result = '修改失敗';
            }
        }

        $memberList = $memberData->getMemberList();
        $this->view('admin/admin', ['memberTable', $memberList, $result]);
    }

    public function deleteMember($id)
    {
        $memberData = $this->model('Admin');
        $memberData->deleteMember($id);
    }

    public function logout()
    {
        $this->model('Admin')->logout();
        header('location: login');
        exit;
    }

    public function getActivity($id)
    {
        $getActivity = $this->model('Admin')->getActivity(addslashes($id));
        $this->view('admin/activityContent', $getActivity);
    }

    public function getSignUpList($id)
    {
        $getActivity = $this->model('Admin')->getSignUpList(addslashes($id));
        $this->view('admin/signUpList', $getActivity);
    }

    public function getMember($id)
    {
        $getMember = $this->model('Admin')->getMember(addslashes($id));
        $this->view('admin/memberContent', $getMember);
    }
}
