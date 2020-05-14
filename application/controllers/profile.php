<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('model_app');

        if(!$this->session->userdata('id_user'))
       {
        $this->session->set_flashdata("msg", "<div class='alert alert-info'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
       </div>");
        redirect('login');
        }
        
    }

    
function view()
    {
        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/profile";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id_user = trim($this->session->userdata('id_user'));


        $sql = 
        "SELECT username,level,email FROM user WHERE username='$id_user' ";

        $row = $this->db->query($sql)->row();
		
        //general
        $data['username'] = $row->username;
        $data['level'] = $row->level;
        $data['email'] = $row->email;
       

	
        $this->load->view('template', $data);
    }

    
}
