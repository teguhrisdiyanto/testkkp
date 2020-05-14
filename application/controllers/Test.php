<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{


    function __construct()

    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {

        $data['judul'] = 'PT. SUMBER BAROKAH';

        // $this->load->view('body/test', $data);
        // // $this->load->view();


        $data['body'] = "body/test";


        $this->load->view("body/test");
    }
}
