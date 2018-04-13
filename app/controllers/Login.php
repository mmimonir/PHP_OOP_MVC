<?php 

class Login extends Dcontroller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Index()
    {
        $this->login();
    }
    public function login()
    {
        Session::init();
        if (Session::get("login")== true) {
            header("Location:".BASE_URL."/Admin");
        }
        $this->load->view("login/login");
    }

    public function loginAuth()
    {
        $userTable  = "tbl_user";
        $userName   = $_POST['userName'];
        $password   = md5($_POST['password']);
        $loginModel = $this->load->model("LoginModel");
        $count      = $loginModel->userControl($userTable, $userName, $password);
        if ($count > 0) {
            $result = $loginModel->getUserData($userTable, $userName, $password);
            Session::init();
            Session::set("login", true);
            Session::set("userName", $result[0]['userName']);
            Session::set("userId", $result[0]['userId']);
            Session::set("level", $result[0]['level']);
            header("Location:".BASE_URL."/Admin");
        } else {
            header("Location:".BASE_URL."/Login");
        }
    }

    public function logout()
    {
        Session::init();
        Session::destroy();
        header("Location:".BASE_URL."/Login");
    }
}
