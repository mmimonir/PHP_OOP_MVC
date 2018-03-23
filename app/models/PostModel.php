<?php 
/**
 * Post Model
 */
class PostModel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPost($tablePost, $tableCat)
    {
        $sql  = "SELECT $tablePost.*, $tableCat.catName FROM $tablePost
        INNER JOIN $tableCat
        ON $tablePost.postCat = $tableCat.catId";
        return $this->db->select($sql);

        $sql  = "SELECT * FROM $table ORDER BY postId DESC LIMIT 3";
        return $this->db->select($sql);
    }

    public function getPostById($tablePost, $tableCat, $postId)
    {
        $sql  = "SELECT $tablePost.*, $tableCat.catName FROM $tablePost
        INNER JOIN $tableCat
        ON $tablePost.postCat = $tableCat.catId
        WHERE $tablePost.postId = $postId";
        return $this->db->select($sql);
    }

    public function getPostByCat($tablePost, $tableCat, $catId)
    {
        $sql  = "SELECT $tablePost.*, $tableCat.catName FROM $tablePost
        INNER JOIN $tableCat
        ON $tablePost.postCat = $tableCat.catId
        WHERE $tableCat.catId = $catId";
        return $this->db->select($sql);
    }

    public function getLatestPost($tablePost)
    {
        $sql = "SELECT * FROM $tablePost ORDER BY postId DESC LIMIT 5";
        return $this->db->select($sql);
    }

    public function getSearchPost($tablePost, $tableCat, $keyword, $catId)
    {
        if (empty($keyword) && $catId == 0) {
            echo "<script>window.location = 'http://localhost/mvc/Index/home';</script>";
            // header("Location:".BASE_URL."/Index/home");
        }
        if (isset($keyword) && !empty($keyword)) {
            $sql  = "SELECT $tablePost.*, $tableCat.catName FROM $tablePost
        INNER JOIN $tableCat
        ON $tablePost.postCat = $tableCat.catId
        WHERE $tablePost.postTitle LIKE '%$keyword%' OR postContent LIKE '%$keyword%'" ;

            /*$sql = "SELECT * FROM $tablePost WHERE postTitle LIKE '%$keyword%' OR postContent LIKE '%$keyword%'";*/
        } elseif (isset($catId)) {
            $sql  = "SELECT $tablePost.*, $tableCat.catName FROM $tablePost
        INNER JOIN $tableCat
        ON $tablePost.postCat = $tableCat.catId
        WHERE $tablePost.postCat =$catId";

            /*$sql = "SELECT * FROM $tablePost WHERE postCat = $catId";*/
        }
        
        return $this->db->select($sql);
    }
}
