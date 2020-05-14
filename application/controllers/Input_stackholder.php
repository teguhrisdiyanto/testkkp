<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_stackholder extends CI_Controller
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


    function input_stackholder_list()
    {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/input_stackholder";
        $data['footer'] = "footer/footer";
        $data['berhasil'] = "0";


        $id_dept = trim($this->session->userdata('id_dept'));
        $id_user = trim($this->session->userdata('id_user'));



        $this->load->view('template', $data);
    }

    function input_stackholder_save()
    {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/Input_stackholder";
        $data['footer'] = "footer/footer";
        $data['berhasil'] = "0";




        $stackholderad = $this->model_app;
        $validation = $this->form_validation;
        $validation->set_rules($stackholderad->rules());

        if ($validation->run()) {
            $stackholderad->inputStackHolder();
            $data['berhasil'] = "1";
            //redirect('Stack_holder/stackholder_list');
            $this->session->set_flashdata("success", 'berhasildisimpan');
        }

        // redirect('Stack_holder/stackholder_list');

        $this->load->view('template', $data);
    }
}
