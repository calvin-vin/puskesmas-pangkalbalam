<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		$data['title'] = 'Halaman Login';
		
		if ($this->form_validation->run() == false) {
			$this->load->view('auth/login', $data);
		} else {

			$data = [
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => htmlspecialchars($this->input->post('password', true)),
				'name' => 'Admin',
				'image' => 'default.jpg',
				'role_id' => 1,
				'is_active' => 1,
				'date_created' => time(),
				'last_login' => time()

			];

			$this->db->insert($data, 'user');
		}
	}
	
}