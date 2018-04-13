<?php 
/**
 * User Controller
 */
class User extends Dcontroller
{
    public function __construct()
    {
        parent::__construct();
        $data = array();
    }

    public function Index()
    {
        $this->makeUser();
    }

    public function makeUser()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view("admin/makeuser");
        $this->load->view('admin/footer');
    }

    public function addNewUser()
    {
        if (!($_POST)) {
            header("Location: ".BASE_URL."/Index");
        }
        $input = $this->load->validation('DForm');
        $input->post('userName')->isEpmty()->length(3, 100);
        $input->post('password')->isEpmty();
        $input->post('level')->isEpmty();
      
        $tableUser   = "tbl_user";
        $userName    = $input->values['userName'];
        $password    = md5($input->values['password']);
        $level       = $input->values['level'];
        
        $data = array(
            'userName'  => $userName,
            'password'  => $password,
            'level'     => $level
        );
        $userModel = $this->load->model("UserModel");
        $result = $userModel->addUser($tableUser, $data);
        $mdata = array();
        if ($result == 1) {
            $mdata['msg'] = "User Created Successfully.";
        } else {
            $mdata['msg'] = "User Not Created.";
        }
        $url = BASE_URL."/User/userList?msg=".urlencode(serialize($mdata));
        header("Location:$url");
    }

    public function userList()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');

       
        $tableUser = "tbl_user";
        $userModel = $this->load->model("UserModel");
        $data['users'] = $userModel->userList($tableUser);


        $this->load->view("admin/userlist", $data);
        $this->load->view('admin/footer');
    }

    public function deleteUser($userId = null)
    {
        $tableUser = "tbl_user";
        $cond  = "userId=$userId";
        $userModel = $this->load->model("UserModel");
        $result = $userModel->deleteUserById($tableUser, $cond);

        $mdata = array();
        if ($result == 1) {
            $mdata['msg'] = "User Deleted Successfully.";
        } else {
            $mdata['msg'] = "User Not Deleted.";
        }
        $url = BASE_URL."/User/userList?msg=".urlencode(serialize($mdata));
        header("Location:$url");
    }
}
