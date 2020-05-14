<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_Proyek extends CI_Controller
{

    public $CI = NULL;


    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Jenis_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('aes');
        $this->CI = &get_instance();
    }

    // function console_log($data)
    // {
    //     echo '<script>';
    //     echo 'console.log(' . json_encode($data) . ')';
    //     echo '</script>';
    // }

    function DescryptAes($param)
    {
        $this->load->library('aes');
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



        $data['jenis'] = $this->Jenis_model->get_Jenis()->result();
        //$data  = $this->Lokasi_model->get_Lokasi()->result();




        // $this->console_log(count($data['jenis']));
        // $this->console_log($data['jenis'][0]->nm_jenis);
        // for ($i = 0; $i < count($data['jenis']); $i++) {
        //     $this->console_log($this->descryptTest($data['jenis'][$i]->nm_jenis));
        //     $data['test'][] = $this->descryptTest($data['jenis'][$i]->nm_jenis);

        // }
        // $data['test'] = "test bro";
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

        $data['judul'] = "Jenis Proyek";

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/jen_view";
        $data['footer'] = "footer/footer";
        $data['berhasil'] = 0;


        // mengirim data ke view
        $this->load->view('template', $data);
    }


    function form_tambah()
    {
        $data['judul'] = "Form Jenis Proyek";

        $this->form_validation->set_rules('jenis', 'Jenis Proyek', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['header'] = "header/header";
            $data['navbar'] = "navbar/navbar";
            $data['sidebar'] = "sidebar/sidebar";
            $data['body'] = "body/Tambah_Jenis_view";
            $data['footer'] = "footer/footer";
            $data['berhasil'] = 0;

            $this->load->view('template', $data);
        } else {

            $password = 'K3LOmPoK@2';
            $passhash = hash("SHA256", $password, true);

            $fsrcmesg = htmlspecialchars(strtoupper(trim($this->input->post('jenis'))));
            $hashmesg = base64_encode($passhash);

            $aes = new AesCtr();
            $emessage = $aes->encrypt($fsrcmesg, $passhash, 128);
            $encode = base64_encode($emessage);
            $result = $hashmesg . $encode;
            // menagkap dan membungkus name form
            // $lokasi = $this->input->post('lokasi');

            // rubah ke bentuk array assosiatif
            $data = array(
                'nm_jenis' => $result
            );

            // model
            $this->db->trans_start();
            $this->Jenis_model->input_data($data, 'jenis');
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata('msg', 'Gagal di tambahkan!');
                redirect('Jenis_Proyek/index');
            } else {
                $this->session->set_flashdata('msg', 'Berhasil di tambah');
                redirect('Jenis_Proyek/index');
            }
        }
    }

    // function tambah()
    // {
    //     $password = 'K3LOmPoK@2';
    //     $passhash = hash("SHA256", $password, true);

    //     $fsrcmesg = htmlspecialchars(strtoupper(trim($this->input->post('jenis'))));
    //     $hashmesg = base64_encode($passhash);

    //     $aes = new AesCtr();
    //     $emessage = $aes->encrypt($fsrcmesg, $passhash, 128);
    //     $encode = base64_encode($emessage);
    //     $result = $hashmesg . $encode;
    //     // menagkap dan membungkus name form
    //     // $lokasi = $this->input->post('lokasi');

    //     // rubah ke bentuk array assosiatif
    //     $data = array(
    //         'nm_jenis' => $result
    //     );

    //     // model
    //     $this->db->trans_start();
    //     $this->Jenis_model->input_data($data, 'jenis');
    //     $this->db->trans_complete();
    //     if ($this->db->trans_status() === FALSE) {
    //         $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
    //                                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                                                 <span aria-hidden="true">&times;</span></button><strong>Data gagal tersimpan!</strong> </div>');
    //         redirect('Jenis_Proyek/index');
    //     } else {
    //         $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
    //                                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                                                 <span aria-hidden="true">&times;</span></button><strong>Data berhasil disimpan!</strong> </div>');
    //         redirect('Jenis_Proyek/index');
    //     }
    // }

    function hapus($id)
    {
        $where = array('kd_jenis' => $id);
        $this->Jenis_model->hapus_data($where, 'jenis');
        $this->session->set_flashdata('msg', 'Data berhasil dihapus');
        redirect('Jenis_Proyek/index');
    }

    function ubah($kd_jenis)
    {

        $data['judul'] = "Form Ubah Jenis Proyek";

        $this->form_validation->set_rules('jenis_ubah', 'Jenis Proyek', 'required');

        if ($this->form_validation->run() == FALSE) {
            $where = array('kd_jenis' => $kd_jenis);
            $data['jenis'] = $this->Jenis_model->ubah_data($where, 'jenis')->result();

            $data['header'] = "header/header";
            $data['navbar'] = "navbar/navbar";
            $data['sidebar'] = "sidebar/sidebar";
            $data['body'] = "body/ubah_jen_view";
            $data['footer'] = "footer/footer";

            $this->load->view('template', $data);
        } else {

            $id_jenis = $this->input->post('id_jenis');

            $password = 'K3LOmPoK@2';
            $passhash = hash("SHA256", $password, true);

            $fsrcmesg = htmlspecialchars(strtoupper(trim($this->input->post('jenis_ubah'))));
            $hashmesg = base64_encode($passhash);

            $aes = new AesCtr();
            $emessage = $aes->encrypt($fsrcmesg, $passhash, 128);
            $encode = base64_encode($emessage);
            $result = $hashmesg . $encode;



            // menagkap dan membungkus name form
            // $lokasi = $this->input->post('lokasi');
            // rubah ke bentuk array assosiatif
            $data = array(
                'nm_jenis' => $result
            );

            $where = array(
                'kd_jenis' => $id_jenis
            );

            // model
            $this->db->trans_start();
            $this->Jenis_model->update_data($where, $data, 'jenis');
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata('msg', 'Data gagal diubah!');
                redirect('Jenis_Proyek/index');
            } else {
                $this->session->set_flashdata('msg', 'Data berhasil diubah');
                redirect('Jenis_Proyek/index');
            }
        }
    }

    // function update()
    // {

    //     $id_jenis = $this->input->post('id_jenis');

    //     $password = 'K3LOmPoK@2';
    //     $passhash = hash("SHA256", $password, true);

    //     $fsrcmesg = htmlspecialchars(strtoupper(trim($this->input->post('jenis'))));
    //     $hashmesg = base64_encode($passhash);

    //     $aes = new AesCtr();
    //     $emessage = $aes->encrypt($fsrcmesg, $passhash, 128);
    //     $encode = base64_encode($emessage);
    //     $result = $hashmesg . $encode;



    //     // menagkap dan membungkus name form
    //     // $lokasi = $this->input->post('lokasi');
    //     // rubah ke bentuk array assosiatif
    //     $data = array(
    //         'nm_jenis' => $result
    //     );

    //     $where = array(
    //         'kd_jenis' => $id_jenis
    //     );

    //     // model
    //     $this->Jenis_model->update_data($where, $data, 'jenis');
    //     $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
    //                                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                                             <span aria-hidden="true">&times;</span></button><strong>Data berhasil diubah!</strong> </div>');
    //     redirect('Jenis_Proyek/index');
    // }
}
