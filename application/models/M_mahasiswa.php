<?php 

class M_mahasiswa extends CI_Model
{
    private $table = 'tb_mahasiswa';

    public function getAll()
    {
        return $this->db->get($this->table);
    }
}


?>