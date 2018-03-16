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
}
