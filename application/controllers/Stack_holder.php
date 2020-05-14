<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stack_holder extends CI_Controller
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


    function stackholder_list()
    {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/list_stackholder";
        $data['footer'] = "footer/footer";
        $data['berhasil'] = 0;

        $data['stackholders'] = $this->model_app->getAllUser();
        $data['nama'] = "budioct";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id_user = trim($this->session->userdata('id_user'));



        $this->load->view('template', $data);
    }

    // function hapus
    function delete($id = null)
    {
        if (isset($id));

        if ($this->model_app->delete($id)) {
            $data['berhasil'] = 1;
            redirect('Stack_holder/stackholder_list');
        }
    }

    function ubah($id = null)

    {
        if (!isset($id)) redirect('Stack_holder/stackholder_list');

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/edit_form_stackholder.php";
        $data['footer'] = "footer/footer";
        $data['berhasil'] = "0";




        $stackholder = $this->model_app;
        $validation = $this->form_validation;
        $validation->set_rules($stackholder->rules());

        if ($validation->run()) {
            $stackholder->update();
            $data['berhasil'] = "1";
            //redirect('Stack_holder/stackholder_list');
            // $this->session->set_flashdata("success", 'berhasildisimpan');
            // $this->load->view('template', $data);
        }

        $data['stackholder'] = $stackholder->getbyId($id);
        if (!$data['stackholder']);
        $this->load->view('template', $data);
    }






    function listTicket()
    {
        echo json_encode($this->model_app->selectListTicket());
    }


    function submitKey()
    {
        $kirimankey = $this->input->post('var_1');
        $sessionkey = $this->session->userdata('key');

        if ($kirimankey == $sessionkey) {
            echo "good";
        } else {
            echo "hallo";
        }
    }
}
