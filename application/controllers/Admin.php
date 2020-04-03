<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	// -----------------------Role----------------------

	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('role', 'Role', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('templates/footer');
		} else {

			$this->db->insert('user_role', ['role' => $this->input->post('role', true)]);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Role baru berhasil ditambahkan
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('admin/role');
		}
	}

	public function delete_role($id)
	{
			$this->db->delete('user_role', ['id' => $id]);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Role berhasil dihapus
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('admin/role');
	}

	public function getEdit_role()
	{
		$id = $this->input->post('id');
		echo json_encode($this->db->get_where('user_role', ['id' => $id])->row_array());
	}

	public function edit_role($id)
	{
		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == true) {
			$data = [
				'role' => $this->input->post('role', true)
			];

			$this->db->where('id', $id);
			$this->db->update('user_role', $data);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Role berhasil diubah
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('admin/role');
		} else {
			$this->session->set_flashdata('message', 
			'<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Role tidak boleh kosong
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('admin/role');
		}
	}

	// --------------------------Role Access--------------------------

	public function roleaccess($id = null)
	{
		if (!$id){
			redirect('admin/role');
		}

		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->db->get_where('user_menu', ['id !=' => 1])->result_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $id])->row_array();


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role-access', $data);
			$this->load->view('templates/footer');
		}
	}

	public function changeroleaccess()
	{
		$data = [
			'menu_id' => $this->input->post('menuId', true),
			'role_id' => $this->input->post('roleId', true)
		];

		$access = $this->db->get_where('user_access_menu', $data);

		if ($access->num_rows() > 0) {
			$this->db->delete('user_access_menu', $data);
		} else {
			$this->db->insert('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Akses berhasil diubah
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
	}

}