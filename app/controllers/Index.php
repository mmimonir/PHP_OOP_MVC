<?php 
class Index extends Dcontroller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function Index()
    {
        $this->home();
    }

    public function home()
    {
        $data = array();
        $tablePost = "tbl_post";
        $tableCat  = "tbl_category";
        $this->load->view("header");


        $catModel = $this->load->model("CatModel");
        $data['catlist'] = $catModel->catList($tableCat);
        $this->load->view("search", $data);

        
        

        $postModel = $this->load->model("PostModel");
        $data['allPost'] = $postModel->getAllPost($tablePost, $tableCat);
        $this->load->view("content", $data);
        
        
        
        $data['latestPost'] = $postModel->getLatestPost($tablePost);
        $this->load->view("sidebar", $data);
        $this->load->view("footer");
    }

    public function postDetails($postId)
    {
        $data = array();
        $tablePost = "tbl_post";
        $tableCat  = "tbl_category";

        $this->load->view("header");
        $catModel = $this->load->model("CatModel");
        $data['catlist'] = $catModel->catList($tableCat);
        $this->load->view("search", $data);

        
        $postModel = $this->load->model("PostModel");
        $data['postById'] = $postModel->getPostById($tablePost, $tableCat, $postId);
        $this->load->view("details", $data);

        
        $data['latestPost'] = $postModel->getLatestPost($tablePost);
        $this->load->view("sidebar", $data);
        $this->load->view("footer");
    }
    public function postByCat($catId)
    {
        $data = array();
        $tablePost = "tbl_post";
        $tableCat  = "tbl_category";
        $this->load->view("header");

        $catModel = $this->load->model("CatModel");
        $data['catlist'] = $catModel->catList($tableCat);
        $this->load->view("search", $data);

        
        $postModel = $this->load->model("PostModel");
        $data['getcat'] = $postModel->getPostByCat($tablePost, $tableCat, $catId);
        $this->load->view("postbycat", $data);

        
        $data['latestPost'] = $postModel->getLatestPost($tablePost);
        $this->load->view("sidebar", $data);
        $this->load->view("footer");
    }

    public function search()
    {
        $keyword =$_REQUEST['keyword'];
        $catId =$_REQUEST['catId'];

        $data = array();
        $tablePost = "tbl_post";
        $tableCat  = "tbl_category";
        $this->load->view("header");

        $catModel = $this->load->model("CatModel");
        $data['catlist'] = $catModel->catList($tableCat);
        $this->load->view("search", $data);

        
        $postModel = $this->load->model("PostModel");
        $data['postbysearch'] = $postModel->getSearchPost($tablePost, $tableCat, $keyword, $catId);
        $this->load->view("sresult", $data);

        
        $data['latestPost'] = $postModel->getLatestPost($tablePost);
        $this->load->view("sidebar", $data);
        $this->load->view("footer");
    }
}
