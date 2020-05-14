<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi extends CI_Controller
{
    public $CI = NULL;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Lokasi_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('aes');
        $this->CI = &get_instance();
    }

    function DescryptAes($param)
    {
        //$this->load->library('aes');
        $password = 'K3LOmPoK@2';
        $passhash = hash("SHA256", $password, true);
        $aes = new AesCtr();

        $fsrcmesg = $param;
        $hashpass = base64_decode(substr($fsrcmesg, 0, 44));
        $pmessage = base64_decode(substr($fsrcmesg, 44));
        $emessage = $aes->decrypt($pmessage, $passhash, 128);

        $result = $emessage;

        return $result;
    }


    function index()
    {

        // memangil model dan mothod  di eksekusi
        // $password = '123';
        // $passhash = hash("SHA256", $password, true);
        // $fsrcmesg = $this->Lokasi_model->get_Lokasi()->result();
        // $hashpass = base64_decode(substr($fsrcmesg,0,44));

        // if($hashpass == $passhash){
        //     $pmessage = base64_decode(substr($fsrcmesg,44));
        //     $aes = new AesCtr();
        //     $emessage =$aes->decrypt($pmessage, $passhash, 128);
        //     $result = $emessage;
        //     $data['plain'] =  $result;
        // }



        $data['lokasi'] = $this->Lokasi_model->get_Lokasi();
        //$data  = $this->Lokasi_model->get_Lokasi()->result();


        // foreach ($data as $row) {


        //     $row_array['N1'] = $row->kd_lokasi;
        //     $row_array['N2'] = $row->nm_lokasi;


        //     $password = '123';
        //     $passhash = hash("SHA256", $password, true);
        //     $aes = new AesCtr();
        //     for($n=1; $n<=2; $n++){
        //         $fsrcmesg[$n] = $row_array['N'.$n];
        //         $hashpass[$n] = base64_decode(substr($fsrcmesg[$n],0,44));
        //         $pmessage[$n] = base64_decode(substr($fsrcmesg[$n],44));
        //         $emessage['N'.$n] = $aes->decrypt($pmessage[$n], $passhash, 128);

        //         $result = $emessage;

        //     }

        //return $result;


        // }
        // PUSH ARRAY

        //$data['lokasi'] =  $result;
        // $data['lokasi'] = $this->Lokasi_model->retrieve(); 

        $data['judul'] = "Lokasi Proyek";

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/lok_view";
        $data['footer'] = "footer/footer";
        $data['berhasil'] = 0;


        // mengirim data ke view
        $this->load->view('template', $data);
    }

    function index2()
    {
        $this->load->view('test');
    }


    function form_tambah()
    {
        $data['judul'] = "Form Lokasi Proyek";

        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['header'] = "header/header";
            $data['navbar'] = "navbar/navbar";
            $data['sidebar'] = "sidebar/sidebar";
            $data['body'] = "body/Tambah_Lokasi_view";
            $data['footer'] = "footer/footer";
            $data['berhasil'] = 0;

            $this->load->view('template', $data);
        } else {

            $password = 'K3LOmPoK@2';
            $passhash = hash("SHA256", $password, true);

            $fsrcmesg = htmlspecialchars(strtoupper(trim($this->input->post('lokasi'))));
            $hashmesg = base64_encode($passhash);

            $aes = new AesCtr();
            $emessage = $aes->encrypt($fsrcmesg, $passhash, 128);
            $encode = base64_encode($emessage);
            $result = $hashmesg . $encode;



            // menagkap dan membungkus name form
            // $lokasi = $this->input->post('lokasi');
            // rubah ke bentuk array assosiatif
            $data = array(
                'nm_lokasi' => $result
            );

            // '<div class="alert alert-danger alert-dismissible" role="alert">
            //                                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //                                         <span aria-hidden="true">&times;</span></button><strong>Data gagal tersimpan!</strong> </div>'

            // '<div class="alert alert-success alert-dismissible" role="alert">
            //                                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //                                         <span aria-hidden="true">&times;</span></button><strong>Data berhasil disimpan!</strong> </div>'

            // model
            $this->db->trans_start();
            $this->Lokasi_model->input_data($data, 'lokasi');
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata('msg', 'Gagal di tambahkan!');
                redirect('Lokasi/index');
            } else {
                $this->session->set_flashdata('msg', 'Berhasil di tambah');
                redirect('Lokasi/index');
            }
        }
    }

    // function tambah()
    // {
    //     $password = 'K3LOmPoK@2';
    //     $passhash = hash("SHA256", $password, true);

    //     $fsrcmesg = htmlspecialchars(strtoupper(trim($this->input->post('lokasi'))));
    //     $hashmesg = base64_encode($passhash);

    //     $aes = new AesCtr();
    //     $emessage = $aes->encrypt($fsrcmesg, $passhash, 128);
    //     $encode = base64_encode($emessage);
    //     $result = $hashmesg . $encode;



    //     // menagkap dan membungkus name form
    //     // $lokasi = $this->input->post('lokasi');
    //     // rubah ke bentuk array assosiatif
    //     $data = array(
    //         'nm_lokasi' => $result
    //     );

    //     // model
    //     $this->db->trans_start();
    //     $this->Lokasi_model->input_data($data, 'lokasi');
    //     $this->db->trans_complete();
    //     if ($this->db->trans_status() === FALSE) {
    //         $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
    //                                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                                                 <span aria-hidden="true">&times;</span></button><strong>Data gagal tersimpan!</strong> </div>');
    //         redirect('Lokasi/index');
    //     } else {
    //         $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
    //                                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                                                 <span aria-hidden="true">&times;</span></button><strong>Data berhasil disimpan!</strong> </div>');
    //         redirect('Lokasi/index');
    //     }
    // }



    function hapus($id)
    {

        // '<div class="alert alert-danger alert-dismissible" role="alert">
        //                                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                                         <span aria-hidden="true">&times;</span></button><strong>Data berhasil hapus!</strong> </div>'

        $where = array('kd_lokasi' => $id);
        $this->Lokasi_model->hapus_data($where, 'lokasi');
        $this->session->set_flashdata('msg', 'Data berhasil dihapus');
        redirect('Lokasi/index');
    }


    function ubah($kd_lokasi)
    {


        $data['judul'] = "Form Ubah Lokasi Proyek";

        $this->form_validation->set_rules('lokasi_ubah', 'Lokasi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $where = array('kd_lokasi' => $kd_lokasi);
            $data['lokasi'] = $this->Lokasi_model->ubah_data($where, 'lokasi')->result();

            $data['header'] = "header/header";
            $data['navbar'] = "navbar/navbar";
            $data['sidebar'] = "sidebar/sidebar";
            $data['body'] = "body/ubah_lok_view";
            $data['footer'] = "footer/footer";

            $this->load->view('template', $data);
        } else {

            $id_lokasi = $this->input->post('id_lokasi');

            $password = 'K3LOmPoK@2';
            $passhash = hash("SHA256", $password, true);

            $fsrcmesg = htmlspecialchars(strtoupper(trim($this->input->post('lokasi_ubah'))));
            $hashmesg = base64_encode($passhash);

            $aes = new AesCtr();
            $emessage = $aes->encrypt($fsrcmesg, $passhash, 128);
            $encode = base64_encode($emessage);
            $result = $hashmesg . $encode;



            // menagkap dan membungkus name form
            // $lokasi = $this->input->post('lokasi');
            // rubah ke bentuk array assosiatif
            $data = array(
                'nm_lokasi' => $result
            );

            $where = array(
                'kd_lokasi' => $id_lokasi
            );

            // <div class="alert alert-success alert-dismissible" role="alert">
            //                                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //                                             <span aria-hidden="true">&times;</span></button><strong>Data berhasil diubah!</strong> </div>'

            // model
            $this->db->trans_start();
            $this->Lokasi_model->update_data($where, $data, 'lokasi');
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata('msg', 'Data gagal diubah!');
                redirect('Lokasi/index');
            } else {
                $this->session->set_flashdata('msg', 'Data berhasil diubah');
                redirect('Lokasi/index');
            }
        }
    }

    // function update()
    // {

    //     $id_lokasi = $this->input->post('id_lokasi');

    //     $password = 'K3LOmPoK@2';
    //     $passhash = hash("SHA256", $password, true);

    //     $fsrcmesg = htmlspecialchars(strtoupper(trim($this->input->post('lokasi_ubah'))));
    //     $hashmesg = base64_encode($passhash);

    //     $aes = new AesCtr();
    //     $emessage = $aes->encrypt($fsrcmesg, $passhash, 128);
    //     $encode = base64_encode($emessage);
    //     $result = $hashmesg . $encode;



    //     // menagkap dan membungkus name form
    //     // $lokasi = $this->input->post('lokasi');
    //     // rubah ke bentuk array assosiatif
    //     $data = array(
    //         'nm_lokasi' => $result
    //     );

    //     $where = array(
    //         'kd_lokasi' => $id_lokasi
    //     );

    //     // <div class="alert alert-success alert-dismissible" role="alert">
    //     //                                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //     //                                             <span aria-hidden="true">&times;</span></button><strong>Data berhasil diubah!</strong> </div>'

    //     // model
    //     $this->Lokasi_model->update_data($where, $data, 'lokasi');
    //     $this->session->set_flashdata('msg', 'Data berhasil diubah');
    //     redirect('Lokasi/index');
    // }
}
