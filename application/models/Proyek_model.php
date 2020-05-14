<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proyek_model extends CI_Model

{

    private $_table = "proyek";


    public function get_Proyek()
    {

        $sql = "SELECT kd_proyek,tgl_proyek,nm_proyek,nilai_kontrak,nilai_dp, bayar, nm_lokasi,nm_jenis FROM proyek 
        INNER JOIN lokasi on lokasi.kd_lokasi = proyek.lokasi_kd_lokasi
        INNER JOIN jenis on jenis.kd_jenis = proyek.jenis_kd_jenis";
        $query = $this->db->query($sql);
        $data = $query->result();

        return $data;
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kd_proyek => $id"])->row();
    }

    public function ubah_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update($where, $data2, $table1)
    {
        $this->db->where($where);
        $this->db->update($table1, $data2);
    }



    public function cicilan($where, $table2)
    {
        return $this->db->get_where($table2, $where);
    }



    public function getlokasi()
    {
        $sql = "SELECT * from lokasi";
        $query = $this->db->query($sql);
        $data = $query->result();
        return $data;
    }

    public function getjenisbangunan()
    {
        $sql = "SELECT * from jenis";
        $query = $this->db->query($sql);
        $data = $query->result();
        return $data;
    }


    // model input
    public function input_data($data)
    {
        return $this->db->insert('Proyek', $data);
    }

    // model hapus
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
