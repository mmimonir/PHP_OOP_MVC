<?php 
/**
 * User Model
 */
class UserModel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function userList($table)
    {
        $sql  = "SELECT * FROM $table ORDER BY userId DESC";
        return $this->db->select($sql);
    }

    public function userById($table, $id)
    {
        $sql  = "SELECT * FROM $table WHERE catId=:id";
        $data = array(":id" => $id);
        return $this->db->select($sql, $data);
    }

    public function addUser($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function UserUpdate($table, $data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }

    public function deleteUserById($table, $cond)
    {
        return $this->db->delete($table, $cond);
    }
}
