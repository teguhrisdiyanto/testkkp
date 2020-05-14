<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi1 extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_app');
        $this->load->library('form_validation');


        if (!$this->session->userdata('id_user')) {
            $this->session->set_flashdata("msg", "<div class='alert alert-info'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
       </div>");
            redirect('login');
        }
    }


    function lokasiList()
    {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/lokasiView";
        $data['footer'] = "footer/footer";
        $data['berhasil'] = 0;


        $data['lokasi'] = $this->model_app->getAllLokasi();
        $data['nama'] = "budioct";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id_user = trim($this->session->userdata('id_user'));



        $this->load->view('template', $data);
    }
}
