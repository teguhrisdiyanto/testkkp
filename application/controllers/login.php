<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_app');
    }


    function index()
    {
        $data = "";

        $this->load->view('login', $data);
    }


    function login_akses()
    {

        $username = trim($this->input->post('username'));
        $password = md5(trim($this->input->post('password')));

        $akses = $this->db->query("SELECT username_user,  status_user, kd_user FROM user WHERE username_user = '$username' AND password_user = '$password'");

        if ($akses->num_rows() == 1) {

            foreach ($akses->result_array() as $data) {

                $session['id_user'] = $data['kd_user'];
                $session['nama'] = $data['username_user'];
                $session['level'] = $data['status_user'];
                // $session['key'] = $data['key'];


                $this->session->set_userdata($session);
                redirect('home');
            }
        } else {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> password dan username tidak cocok.
       </div>");
            redirect('login');
        }
    }


    public function logout()
    {

        $this->session->sess_destroy();

        redirect('login');
    }
}
