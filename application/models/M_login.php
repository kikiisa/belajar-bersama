<?php 



class M_login extends CI_Model
{
    public function authenticate($u,$p)
    {
        $data = $this->db->query("SELECT * FROM tb_user WHERE username = '$u'");
        return $data;
    }
}



?>