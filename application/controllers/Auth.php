<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		$data['title'] = 'Halaman Login';
		
		if ($this->form_validation->run() == false) {
			$this->load->view('auth/login', $data);
		} else {

			$email = $this->input->post('email', true);
			$password = $this->input->post('password', true);

			$user = $this->db->get_where('user', ['email' => $email])->row_array();

			if ($user) {

				if ($user['is_active'] == 1) {

					if (password_verify($password, $user['password'])) {

						$data = [
							'email' => $user['email'],
							'role_id' => $user['role_id']
						];

						$this->session->set_userdata($data);

						if ($user['role_id'] == 1) {
							redirect('admin');
						} else if ($user['role_id'] == 2){
							redirect('user');
						}

					} else {
						$this->session->set_flashdata('message', 
							'<div class="alert alert-danger" role="alert">Password yang anda masukkan salah!</div>');
						redirect('auth');
					}

				} else {
					$this->session->set_flashdata('message', 
							'<div class="alert alert-danger" role="alert">Email tidak aktif!</div>');
						redirect('auth');
				}

			} else {
				$this->session->set_flashdata('message', 
						'<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');
					redirect('auth');
			}

		}
	}

	public function logout()
	{
		$this->db->set('last_login', time());
		$this->db->where('email', $this->session->userdata('email'));
		$this->db->update('user');

		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil logout</div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}


	// register
	// $data = [
	// 			'email' => htmlspecialchars($this->input->post('email', true)),
	// 			'password' => htmlspecialchars(password_hash($this->input->post('password', true), PASSWORD_DEFAULT)),
	// 			'name' => 'Admin',
	// 			'image' => 'default.jpg',
	// 			'role_id' => 1,
	// 			'is_active' => 1,
	// 			'date_created' => time(),
	// 			'last_login' => time()

	// 		];

	// $this->db->insert('user', $data);
	
}