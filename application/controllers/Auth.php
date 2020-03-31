<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->form_validation();
	}

	public function index()
	{
		$this->form_validation->set_rules();

		$data['title'] = 'Halaman Login';
		$this->load->view('auth/login');
	}
	
}