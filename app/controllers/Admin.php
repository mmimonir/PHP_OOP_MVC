<?php 

class Admin extends Dcontroller
{
    public function __construct()
    {
        parent::__construct();
        Session::checkSession();
    }

    public function Index()
    {
        $this->home();
    }

    public function home()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }

    public function addCategory()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/addcategory');
        $this->load->view('admin/footer');
    }

    public function categoryList()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');

        $data = array();
        $table = "tbl_category";
        $catModel = $this->load->model("CatModel");
        $data['cat'] = $catModel->catList($table);


        $this->load->view("admin/categorylist", $data);
        $this->load->view('admin/footer');
    }
}
