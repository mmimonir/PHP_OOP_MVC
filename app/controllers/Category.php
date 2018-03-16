<?php 
/**
 * Category Controller
 */
class Category extends Dcontroller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function categoryList()
    {
        $data = array();
        $table = "tbl_category";
        $catModel = $this->load->model("CatModel");
        $data['cat'] = $catModel->catList($table);
        $this->load->view("category", $data);
    }

    public function catById()
    {
        $data = array();
        $table = "tbl_category";
        $id = 2;
        $catModel = $this->load->model("CatModel");
        $data['catbyid'] = $catModel->catById($table, $id);
        $this->load->view("catbyid", $data);
    }

    public function addCategory()
    {
        $this->load->view("addcategory");
    }

    public function insertCategory()
    {
        $table 	  = "tbl_category";
        $catName  = $_POST['catName'];
        $catTitle = $_POST['catTitle'];
        
        $data = array(
            'catName' 	=> $catName,
            'catTitle' 	=> $catTitle
        );
        $catModel = $this->load->model("CatModel");
        $result = $catModel->insertCat($table, $data);
        $mdata = array();
        if ($result == 1) {
            $mdata['msg'] = "Category Added Successfully.";
        } else {
            $mdata['msg'] = "Category Not Added.";
        }
        $this->load->view("addcategory", $mdata);
    }

    public function updateCategory()
    {
        $table = "tbl_category";
        $id = 4;
        $catModel = $this->load->model("CatModel");
        $data = array();
        $data['catById'] = $catModel->catById($table, $id);
        $this->load->view("catUpdate", $data);
    }

    public function updateCat()
    {
        $table 	  = "tbl_category";
        
        $catId    = $_POST['catId'];
        $catName  = $_POST['catName'];
        $catTitle = $_POST['catTitle'];
        
        $cond = "catId=$catId";
        $data = array(
            'catName' 	=> $catName,
            'catTitle' 	=> $catTitle
        );

        $catModel = $this->load->model("CatModel");
        $result = $catModel->catUpdate($table, $data, $cond);

        $mdata = array();
        if ($result == 1) {
            $mdata['msg'] = "Category Updated Successfully.";
        } else {
            $mdata['msg'] = "Category Not Updated.";
        }
        $this->load->view("catUpdate", $mdata);
    }

    public function deleteCatById()
    {
        $table = "tbl_category";
        $cond  = "catId=3";
        $catModel = $this->load->model("CatModel");
        $catModel->deleteCatById($table, $cond);
    }
}
