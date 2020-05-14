<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proyek extends CI_Controller
{
    public $CI = NULL;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Proyek_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('aes');
        $this->CI = &get_instance();
    }

    function DescryptAes($param)
    {
        // $this->load->library('aes');
        $password = 'K3LOmPoK@2';
        $passhash = hash("SHA256", $password, true);
        $aes = new AesCtr();

        $fsrcmesg = $param;
        $pmessage = base64_decode(substr($fsrcmesg, 44));
        $emessage = $aes->decrypt($pmessage, $passhash, 128);

        $result = $emessage;

        return $result;
    }


    function EncryptAes($param)
    {

        $password = 'K3LOmPoK@2';
        $passhash = hash("SHA256", $password, true);

        $fsrcmesg = $param;
        $hashmesg = base64_encode($passhash);

        $aes = new AesCtr();
        $emessage = $aes->encrypt($fsrcmesg, $passhash, 128);
        $encode = base64_encode($emessage);
        $result = $hashmesg . $encode;

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



        $data['proyek'] = $this->Proyek_model->get_Proyek();

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


        $data['judul'] = "Data Proyek";

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/Proyek_view";
        $data['footer'] = "footer/footer";
        $data['berhasil'] = 0;

        // mengirim data ke view
        $this->load->view('template', $data);
    }

    function form_tambah()
    {

        $data['judul'] = "Form Data Proyek";

        $this->form_validation->set_rules('tglProyek', 'Tanggal Proyek', 'required');
        $this->form_validation->set_rules('nmproyek', 'Nama Proyek', 'required');
        $this->form_validation->set_rules('nkontrak', 'Nilai Kontak', 'required|numeric');
        $this->form_validation->set_rules('nDP', 'Nilai DP', 'required|numeric');
        $this->form_validation->set_rules('lokasiProyek', 'Lokasi Proyek', 'required');
        $this->form_validation->set_rules('jenisProyek', 'Jenis Proyek', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['header'] = "header/header";
            $data['navbar'] = "navbar/navbar";
            $data['sidebar'] = "sidebar/sidebar";
            $data['body'] = "body/Tambah_Proyek_view";
            $data['footer'] = "footer/footer";
            $data['berhasil'] = 0;

            $data['lokasi'] = $this->Proyek_model->getlokasi();
            $data['jenis'] = $this->Proyek_model->getjenisbangunan();

            $this->load->view('template', $data);
        } else {

            // $fsrcmesg = $this->input->post($tgl_proyek);
            $tgl_proyek = htmlspecialchars(strtoupper(trim($this->input->post('tglProyek'))));
            $nama_proyek = htmlspecialchars(strtoupper(trim($this->input->post('nmproyek'))));
            $nilaiKonrak_proyek = htmlspecialchars(strtoupper(trim($this->input->post('nkontrak'))));
            $nilaiDP_proyek = htmlspecialchars(strtoupper(trim($this->input->post('nDP'))));
            $bayar = htmlspecialchars(strtoupper(trim($this->input->post('bayar'))));
            $lokasi_proyek = htmlspecialchars(strtoupper(trim($this->input->post('lokasiProyek'))));
            $jenis_proyek = htmlspecialchars(strtoupper(trim($this->input->post('jenisProyek'))));


            $res_tgl_proyek = $this->EncryptAes($tgl_proyek);
            $res_nama_proyek = $this->EncryptAes($nama_proyek);
            $res_nilaiKonrak_proyek = $this->EncryptAes($nilaiKonrak_proyek);
            $res_nilaiDP_proyek = $this->EncryptAes($nilaiDP_proyek);
            $res_bayar = $this->EncryptAes($bayar);
            $res_lokasi_proyek = $lokasi_proyek;
            $res_jenis_proyek = $jenis_proyek;

            // menagkap dan membungkus name form
            // $lokasi = $this->input->post('lokasi');

            // rubah ke bentuk array assosiatif
            $data = array(
                'tgl_proyek' =>  $res_tgl_proyek,
                'nm_proyek' => $res_nama_proyek,
                'nilai_kontrak' =>  $res_nilaiKonrak_proyek,
                'nilai_dp' => $res_nilaiDP_proyek,
                'bayar' => $res_bayar,
                'lokasi_kd_lokasi' => $res_lokasi_proyek,
                'jenis_kd_jenis' => $res_jenis_proyek

            );

            // model 1
            // $this->Proyek_model->input_data($data, 'proyek');
            // $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
            //                                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //                                             <span aria-hidden="true">&times;</span></button><strong>Data berhasil ditambahkan!</strong> </div>');
            // redirect('Proyek/index');

            // model 2
            $this->db->trans_start();
            $this->Proyek_model->input_data($data, 'proyek');
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata('msg', 'Gagal di tambahkan!');
                redirect('Proyek/index');
            } else {
                $this->session->set_flashdata('msg', 'Berhasil di tambah');
                redirect('Proyek/index');
            }
        }
    }

    // function tambah()
    // {

    //     $tgl_proyek = htmlspecialchars(strtoupper(trim($this->input->post('tglProyek'))));
    //     $nama_proyek = htmlspecialchars(strtoupper(trim($this->input->post('nmproyek'))));
    //     $nilaiKonrak_proyek = htmlspecialchars(strtoupper(trim($this->input->post('nkontrak'))));
    //     $nilaiDP_proyek = htmlspecialchars(strtoupper(trim($this->input->post('nDP'))));
    //     $bayar = htmlspecialchars(strtoupper(trim($this->input->post('bayar'))));
    //     $lokasi_proyek = htmlspecialchars(strtoupper(trim($this->input->post('lokasiProyek'))));
    //     $jenis_proyek = htmlspecialchars(strtoupper(trim($this->input->post('jenisProyek'))));

    //     $data1 = array(
    //         'tgl_proyek' => $tgl_proyek,
    //         'nm_proyek' => $nama_proyek,
    //         'nilai_kontrak' => $nilaiKonrak_proyek,
    //         'nilai_dp' => $nilaiDP_proyek
    //         // 'lokasi_kd_lokasi' => $lokasi_proyek,
    //         // 'jenis_kd_jenis' => $jenis_proyek
    //     );



    //     $password = 'K3LOmPoK@2';
    //     $passhash = hash("SHA256", $password, true);

    //     $fsrcmesg = $this->input->post($data1);
    //     $hashmesg = base64_encode($passhash);

    //     $aes = new AesCtr();
    //     $emessage = $aes->encrypt($fsrcmesg, $passhash, 128);
    //     $encode = base64_encode($emessage);
    //     $result = $hashmesg . $encode;

    //     // menagkap dan membungkus name form
    //     // $lokasi = $this->input->post('lokasi');

    //     // rubah ke bentuk array assosiatif
    //     $data = array(
    //         'tgl_proyek' =>  $tgl_proyek,
    //         'nm_proyek' => $nama_proyek,
    //         'nilai_kontrak' =>  $nilaiKonrak_proyek,
    //         'nilai_dp' => $nilaiDP_proyek,
    //         'bayar' => $bayar,
    //         'lokasi_kd_lokasi' => $lokasi_proyek,
    //         'jenis_kd_jenis' => $jenis_proyek

    //     );

    //     // model 1
    //     // $this->Proyek_model->input_data($data, 'proyek');
    //     // $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
    //     //                                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //     //                                             <span aria-hidden="true">&times;</span></button><strong>Data berhasil ditambahkan!</strong> </div>');
    //     // redirect('Proyek/index');

    //     // model 2
    //     $this->db->trans_start();
    //     $this->Proyek_model->input_data($data, 'proyek');
    //     $this->db->trans_complete();
    //     if ($this->db->trans_status() === FALSE) {
    //         $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
    //                                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                                                 <span aria-hidden="true">&times;</span></button><strong>Data gagal tersimpan!</strong> </div>');
    //         redirect('Proyek/index');
    //     } else {
    //         $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
    //                                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                                                 <span aria-hidden="true">&times;</span></button><strong>Data berhasil disimpan!</strong> </div>');
    //         redirect('Proyek/index');
    //     }
    // }


    function hapus($id)
    {
        $where = array('kd_proyek' => $id);
        $this->Proyek_model->hapus_data($where, 'proyek');
        $this->session->set_flashdata('msg', 'Data berhasil dihapus');
        redirect('Proyek/index');
    }



    function cicilan($kd_lokasi)
    {

        $data['judul'] = "Data Cicialan";

        $where = array('kd_proyek' => $kd_lokasi);
        $data['proyek'] = $this->Proyek_model->ubah_data($where, 'proyek')->result();

        $where1 = array('proyek_kd_proyek' => $kd_lokasi);
        $data['cicilan'] = $this->Proyek_model->cicilan($where1, 'cicilan')->result();

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/cicilan_view";
        $data['footer'] = "footer/footer";
        $data['berhasil'] = 0;

        $this->load->view('template', $data);
    }
}
