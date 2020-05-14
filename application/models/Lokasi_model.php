<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi_model extends CI_Model
{

    private $_table = "lokasi";

    public function get_Lokasi()
    {
        // return $this->db->get('lokasi');
        $sql = "SELECT kd_lokasi, nm_lokasi FROM lokasi";
        $query = $this->db->query($sql);
        $data = $query->result();

        return $data;
    }


    // model input
    public function input_data($data)
    {
        return $this->db->insert('lokasi', $data);
    }

    // model hapus
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kd_lokasi => $id"])->row();
    }

    public function ubah_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
