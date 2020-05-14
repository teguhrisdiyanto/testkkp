<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_model extends CI_Model
{
    public function get_Jenis()
    {
        return $this->db->get('jenis');
        //    $sql = "SELECT kd_lokasi, nm_lokasi FROM lokasi";

        //    $query = $this->db->query($sql);
        //    $data = $query->result();


    }


    // model input
    public function input_data($data)
    {
        return $this->db->insert('jenis', $data);
    }

    // model hapus
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
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
