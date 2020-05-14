<?php
defined('BASEPATH') or exit('No direct script access allowed');

class coba extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
	}

	function index()
	{

		$data['namasaya'] = "nama saya budi ";
		$data['namapanjang'] = "oktaviansyah";


		$this->load->view('budi', $data);
	}
}
