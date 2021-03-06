<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Profil Saya';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		$data['title'] = 'Ubah Profil';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Nama', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit-profile', $data);
			$this->load->view('templates/footer');
		} else {

			$email = $this->input->post('email');
			$name = $this->input->post('name');

			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {

				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/profile/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.png') {
						unlink( FCPATH . '/assets/img/profile/'. $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}

			}

			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Profil berhasil diubah
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('user');
		}
	}

	public function changePassword()
	{
		$data['title'] = 'Ubah Password';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password Baru', 'required|trim|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password Baru', 'required|trim|min_length[3]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/change-password', $data);
			$this->load->view('templates/footer');
		} else {

			$current_password = $this->input->post('current');
			$new_password = $this->input->post('password1');

			if (!password_verify($current_password, $data['user']['password'])) {

				$this->session->set_flashdata('message', 
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Password lama yang dimasukkan salah!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('user/changepassword');
			} else {
			
				if ($new_password == $current_password) {

					$this->session->set_flashdata('message',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  Password lama dan baru tidak boleh sama!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
					redirect('user/changepassword');

				} else {

					$this->db->set('password', password_hash($new_password, PASSWORD_DEFAULT));
					$this->db->where('email', $data['user']['email']);
					$this->db->update('user');

					$this->session->set_flashdata('message', 
					'<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Password berhasil diubah
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
					redirect('user/changepassword');
				}
			}
		} 
	}

}