<?php 
class Index extends Dcontroller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function home()
    {
        $this->load->view("header");
        $data = array();
        $tablePost = "tbl_post";
        $tableCat  = "tbl_category";

        $postModel = $this->load->model("PostModel");
        $data['allPost'] = $postModel->getAllPost($tablePost, $tableCat);
        
        $this->load->view("content", $data);
        $this->load->view("sidebar");
        $this->load->view("footer");
    }

    public function postDetails($postId)
    {
        $this->load->view("header");

        $data = array();
        $tablePost = "tbl_post";
        $tableCat  = "tbl_category";
        $postModel = $this->load->model("PostModel");
        $data['postById'] = $postModel->getPostById($tablePost, $tableCat, $postId);

        $this->load->view("details", $data);
        $this->load->view("sidebar");
        $this->load->view("footer");
    }
    public function postByCat($catId)
    {
        $this->load->view("header");

        $data = array();
        $tablePost = "tbl_post";
        $tableCat  = "tbl_category";
        $postModel = $this->load->model("PostModel");
        $data['getcat'] = $postModel->getPostByCat($tablePost, $tableCat, $catId);

        $this->load->view("postbycat", $data);
        $this->load->view("sidebar");
        $this->load->view("footer");
    }
}
