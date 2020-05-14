<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cicilan extends CI_Controller
{
    public $CI = NULL;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Proyek_model');
        $this->load->model('Cicilan_model');
        $this->load->library('form_validation');
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


        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/cicilan_view";
        $data['footer'] = "footer/footer";
        $data['berhasil'] = 0;





        // mengirim data ke view
        $this->load->view('template', $data);
    }

    function form_tambah()
    {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/Tambah_Proyek_view";
        $data['footer'] = "footer/footer";
        $data['berhasil'] = 0;


        // $data['proyek'] = $this->Proyek_model->get_Proyek();
        // $data['proyek'] = $this->Proyek_model->get_data();
        $data['lokasi'] = $this->Proyek_model->getlokasi();
        $data['jenis'] = $this->Proyek_model->getjenisbangunan();

        $this->load->view('template', $data);
    }

    function tambah()
    {





        // $password = 'K3LOmPoK@2';
        // $passhash = hash("SHA256", $password, true);

        // $fsrcmesg = $this->input->post($data2);
        // $hashmesg = base64_encode($passhash);

        // $aes = new AesCtr();
        // $emessage = $aes->encrypt($fsrcmesg, $passhash, 128);
        // $encode = base64_encode($emessage);
        // $result = $hashmesg . $encode;

        // menagkap dan membungkus name form
        // $lokasi = $this->input->post('lokasi');


        $tgl_cicilan = $this->input->post('tgl_cicilan');
        $cicilan = $this->input->post('cicilan');
        $proyek_kd_proyek = $this->input->post('dari_kd_proyek');
        $bayar = $this->input->post('total');
        $ischeck = $this->input->post('check', TRUE) == null ? 0 : 1;

        // enkrip
        $res_tgl_cicilan = $this->EncryptAes($tgl_cicilan);
        $res_cicilan = $this->EncryptAes($cicilan);
        $res_bayar = $this->EncryptAes($bayar);


        $data = array(
            'tgl_cicilan' => $res_tgl_cicilan,
            'nominal' => $res_cicilan,
            'proyek_kd_proyek' => $proyek_kd_proyek,
            'is_draf' => $ischeck
        );
        // model post



        $data2 = array(
            'bayar' => $res_bayar
        );

        $where = array(
            'kd_proyek' => $proyek_kd_proyek
        );

        // model update

        $this->Cicilan_model->input_data($data, 'cicilan');

        if ($ischeck == 1) {
            $this->Proyek_model->update($where, $data2, 'proyek');
        }



        redirect('Proyek/cicilan/' . $proyek_kd_proyek);
    }

    function hapus($id)
    {
        $where = array('kd_proyek' => $id);
        $this->Proyek_model->hapus_data($where, 'proyek');
        redirect('Proyek/index');
    }



    function cicilan($kd_lokasi)
    {


        $where = array('kd_proyek' => $kd_lokasi);
        $data['proyek'] = $this->Proyek_model->ubah_data($where, 'proyek')->result();

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/cicilan_view";
        $data['footer'] = "footer/footer";
        $data['berhasil'] = 0;

        $this->load->view('template', $data);
    }


    function edit()
    {
        $bayar = $this->input->post('total_modal');
        $ischeck = $this->input->post('check_id', TRUE) == null ? 0 : 1;
        $proyek_kd_proyek = $this->input->post('dari_kd_proyek_modal');
        $nocicilan_modal = $this->input->post('nocicilan_modal');
        $nominal_modal = $this->input->post('nominal_modal');


        $res_bayar = $this->EncryptAes($bayar);
        $res_nominal_modal = $this->EncryptAes($nominal_modal);


        $data1 = array(
            'bayar' => $res_bayar
        );


        $where = array(
            'kd_proyek' => $proyek_kd_proyek
        );

        $where2 = array(
            'no_cicilan' => $nocicilan_modal
        );

        if ($ischeck == 1) {
            $data2 = array(
                'is_draf' => $ischeck,
                'nominal' => $res_nominal_modal
            );
            $this->Proyek_model->update($where, $data1, 'proyek');
            $this->Proyek_model->update($where2, $data2, 'cicilan');
        }

        redirect('Proyek/cicilan/' . $proyek_kd_proyek);
    }
}
