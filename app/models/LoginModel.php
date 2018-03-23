<?php 
/**
 * Login Model
 */
class LoginModel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function userControl($userTable, $userName, $password)
    {
        $sql = "SELECT * FROM $userTable WHERE userName =? AND password = ?";
        return $this->db->affectedRows($sql, $userName, $password);
    }

    public function getUserData($userTable, $userName, $password)
    {
        $sql = "SELECT * FROM $userTable WHERE userName =? AND password = ?";
        return $this->db->selectUser($sql, $userName, $password);
    }
}
