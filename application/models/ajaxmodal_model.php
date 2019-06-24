<?php if (!defined("BASEPATH")) {
    exit("Tidak dapat mengakses langsung");
}

class Ajaxmodal_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function userGetAll()
    {
        $query = "SELECT * FROM user";
        return $this->db->query($query)->result_array();
    }
    function userGetById($params)
    {
        $query = "SELECT * FROM user where id=?";
        return $this->db->query($query,$params)->result_array();
    }
}
