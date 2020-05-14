<?php

class Cicilan_model extends CI_Model
{
    private $_table = "cicilan";

    public function input_data($data)
    {
        return $this->db->insert('cicilan', $data);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["proyek_kd_proyek => $id"])->row();
    }
}
