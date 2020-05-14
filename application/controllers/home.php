<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    function __construct()
    {
        parent::__construct();


        if (!$this->session->userdata('id_user')) {
            $this->session->set_flashdata("msg", "<div class='alert alert-info'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
       </div>");
            redirect('login');
        }
    }


    function index()
    {

        $data['judul'] = "Home";

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/Home";
        $data['footer'] = "footer/footer";




        $this->load->view('template', $data);
    }
}
