<?php 

class Admin extends Dcontroller
{
    public function __construct()
    {
        parent::__construct();
        Session::checkSession();
        $data = array();
    }

    public function Index()
    {
        $this->home();
    }

    public function home()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        // $data["user"] = array("username" => Session::get("userName"));
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

    public function insertCategory()
    {
        $table    = "tbl_category";
        $catName  = $_POST['catName'];
        $catTitle = $_POST['catTitle'];
        
        $data = array(
            'catName'   => $catName,
            'catTitle'  => $catTitle
        );
        $catModel = $this->load->model("CatModel");
        $result = $catModel->insertCat($table, $data);
        $mdata = array();
        if ($result == 1) {
            $mdata['msg'] = "Category Added Successfully.";
        } else {
            $mdata['msg'] = "Category Not Added.";
        }
        $url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
        header("Location:$url");
        // $this->load->view("addcategory", $mdata);
    }

    public function categoryList()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');

       
        $table = "tbl_category";
        $catModel = $this->load->model("CatModel");
        $data['cat'] = $catModel->catList($table);


        $this->load->view("admin/categorylist", $data);
        $this->load->view('admin/footer');
    }

    public function editCategory($catId=null)
    {
        $table = "tbl_category";
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $catModel = $this->load->model("CatModel");
        $data['catById'] = $catModel->catById($table, $catId);
        $this->load->view("admin/editcat", $data);
        $this->load->view('admin/footer');
    }

    public function updateCat($catId=null)
    {
        $table    = "tbl_category";
        $catName  = $_POST['catName'];
        $catTitle = $_POST['catTitle'];
        
        $cond = "catId=$catId";
        $data = array(
            'catName'   => $catName,
            'catTitle'  => $catTitle
        );

        $catModel = $this->load->model("CatModel");
        $result = $catModel->catUpdate($table, $data, $cond);

        $mdata = array();
        if ($result == 1) {
            $mdata['msg'] = "Category Updated Successfully.";
        } else {
            $mdata['msg'] = "Category Not Updated.";
        }
        $url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
        header("Location:$url");
        // $this->load->view("catUpdate", $mdata);
    }

    public function deleteCategory($catId=null)
    {
        $table = "tbl_category";
        $cond  = "catId=$catId";
        $catModel = $this->load->model("CatModel");
        $result = $catModel->deleteCatById($table, $cond);

        $mdata = array();
        if ($result == 1) {
            $mdata['msg'] = "Category Deleted Successfully.";
        } else {
            $mdata['msg'] = "Category Not Deleted.";
        }
        $url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
        header("Location:$url");
    }

    public function addArticle()
    {
        $table = "tbl_category";
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');

        $catModel = $this->load->model("CatModel");
        $data['catlist'] = $catModel->catList($table);
        $this->load->view('admin/addpost', $data);
        $this->load->view('admin/footer');
    }

    public function addNewPost()
    {
        if (!($_POST)) {
            header("Location: ".BASE_URL."/Admin/addArticle");
        }
        $input = $this->load->validation('DForm');
        $input->post('postTitle')->isEpmty()->length(10, 500);
        $input->post('postContent')->isEpmty();
        $input->post('postCat')->isCatEpmty();

        if ($input->submit()) {
            $tablePost   = "tbl_post";
            $postTitle   = $input->values['postTitle'];
            $postContent = $input->values['postContent'];
            $postCat     = $input->values['postCat'];
        
            $data = array(
            'postTitle'    => $postTitle,
            'postContent'  => $postContent,
            'postCat'      => $postCat
        );
            $postModel = $this->load->model("PostModel");
            $result = $postModel->insertPost($tablePost, $data);
            $mdata = array();
            if ($result == 1) {
                $mdata['msg'] = "Article Added Successfully.";
            } else {
                $mdata['msg'] = "Article Not Added.";
            }
            $url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
            header("Location:$url");
        } else {
            $data['postErrors'] = $input->errors;
            $table = "tbl_category";
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');

            $catModel = $this->load->model("CatModel");
            $data['catlist'] = $catModel->catList($table);
            $this->load->view('admin/addpost', $data);
            $this->load->view('admin/footer');
        }
    }
    public function articleList()
    {
        $tableCat    = "tbl_category";
        $tablePost   = "tbl_post";
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');

        $postModel = $this->load->model("PostModel");
        $data['listPost'] = $postModel->getPostList($tablePost, $tableCat);
        $this->load->view('admin/postlist', $data);
        $this->load->view('admin/footer');
    }

    public function editArticle($postId = null)
    {
        $tableCat    = "tbl_category";
        $tablePost   = "tbl_post";
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');

        $postModel = $this->load->model("PostModel");
        $data['postbyid'] = $postModel->postById($tablePost, $tableCat, $postId);
        $this->load->view('admin/editpost', $data);
        $this->load->view('admin/footer');
    }

    public function updatePost($postId = null)
    {
        $input = $this->load->validation('DForm');
        $input->post('postTitle')->isEpmty()->length(10, 500);
        $input->post('postContent')->isEpmty();
        $input->post('postCat')->isCatEpmty();
        
        if ($input->submit()) {
            $cond = "postId=$postId";
            $tablePost   = "tbl_post";
            $postTitle   = $input->values['postTitle'];
            $postContent = $input->values['postContent'];
            $postCat     = $input->values['postCat'];

            $data = array(
            'postTitle'    => $postTitle,
            'postContent'  => $postContent,
            'postCat'      => $postCat
        );

            $postModel = $this->load->model("PostModel");
            $result = $postModel->updatePost($tablePost, $data, $cond);

            $mdata = array();
            if ($result == 1) {
                $mdata['msg'] = "Article Updated Successfully.";
            } else {
                $mdata['msg'] = "Article Not Updated.";
            }
            $url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
            header("Location:$url");
            // $this->load->view("catUpdate", $mdata);
        } else {
            $data['postErrors'] = $input->errors;
            $table = "tbl_category";
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');

            $catModel = $this->load->model("CatModel");
            $data['catlist'] = $catModel->catList($table);
            $this->load->view('admin/addpost', $data);
            $this->load->view('admin/footer');
        }
    }
    public function deleteArticle($postId = null)
    {
        $table = "tbl_post";
        $cond  = "postId=$postId";
        $postModel = $this->load->model("PostModel");
        $result = $postModel->deletePostById($table, $cond);

        $mdata = array();
        if ($result == 1) {
            $mdata['msg'] = "Article Deleted Successfully.";
        } else {
            $mdata['msg'] = "Article Not Deleted.";
        }
        $url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
        header("Location:$url");
    }

    public function uioption()
    {
        $tableUI = "tbl_ui";
        $uiModel = $this->load->model("UIModel");
        $data['color'] = $uiModel->getColor($tableUI);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/ui');
        $this->load->view('admin/footer');
    }

    public function changeUI()
    {
        $input = $this->load->validation('DForm');
        $input->post('color');
        $id      = 1;
        $cond    = "id=$id";
        $tableUI = "tbl_ui";
        $color   = $input->values['color'];
        $data    = array(
            'color' => $color
        );

        $uiModel = $this->load->model("UIModel");
        $result = $uiModel->updateBackground($tableUI, $data, $cond);

        $mdata = array();
        if ($result == 1) {
            $mdata['msg'] = "Background Color Updated Successfully.";
        } else {
            $mdata['msg'] = "Background Color Not Updated.";
        }
        $url = BASE_URL."/Admin/uioption?msg=".urlencode(serialize($mdata));
        header("Location:$url");
        // $this->load->view("catUpdate", $mdata);
    }
}
