<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Puskesmas_model', 'puskesmas');
	}

	public function index()
	{
		$data['title'] = 'Manajemen Menu';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/footer', $data);
		} else {

			$this->db->insert('user_menu', ['menu' => $this->input->post('menu', true)]);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Menu baru berhasil ditambahkan
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('menu');

		}
	}

	public function delete($id)
	{
		$this->db->delete('user_menu', ['id' => $id]);
		$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Menu berhasil dihapus
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('menu');
	}

	public function getEdit()
	{
		$id = $this->input->post('id');
		echo json_encode($this->db->get_where('user_menu', ['id' => $id])->row_array());
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == true) {
			$data = [
				'menu' => $this->input->post('menu', true)
			];

			$this->db->where('id', $id);
			$this->db->update('user_menu', $data);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Menu berhasil diubah
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('menu');
		} else {
			$this->session->set_flashdata('message', 
			'<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Menu tidak boleh kosong
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('menu');
		}
	}


	// ----------------------------submenu feature---------------------------

	public function submenu()
	{
		$data['title'] = 'Manajemen Submenu';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['submenu'] = $this->puskesmas->getSubmenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Submenu', 'required|trim');
		$this->form_validation->set_rules('menu_id', 'menu', 'required|trim');
		$this->form_validation->set_rules('url', 'URL', 'required|trim');
		$this->form_validation->set_rules('icon', 'Icon', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/footer', $data);
		} else {

			$data = [
				'title' => $this->input->post('title', true),
				'menu_id' => $this->input->post('menu_id', true),
				'url' => $this->input->post('url', true),
				'icon' => $this->input->post('icon', true),
				'is_active' => 1
			];

			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Submenu baru berhasil ditambahkan
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('menu/submenu');

		}
	}

	public function delete_submenu($id)
	{
		$this->db->delete('user_sub_menu', ['id' => $id]);
		$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Submenu berhasil dihapus
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('menu/submenu');
	}

	public function getEdit_submenu()
	{
		$id = $this->input->post('id');
		echo json_encode($this->puskesmas->getSubmenu_single($id));
	}

	public function edit_submenu($id)
	{
		$this->form_validation->set_rules('title', 'Submenu', 'required|trim');
		$this->form_validation->set_rules('menu_id', 'menu', 'required|trim');
		$this->form_validation->set_rules('url', 'URL', 'required|trim');
		$this->form_validation->set_rules('icon', 'Icon', 'required|trim');

		if ($this->form_validation->run() == true) {
			$data = [
				'title' => $this->input->post('title', true),
				'menu_id' => $this->input->post('menu_id', true),
				'url' => $this->input->post('url', true),
				'icon' => $this->input->post('icon', true)
			];

			$this->db->where('id', $id);
			$this->db->update('user_sub_menu', $data);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Submenu berhasil diubah
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('menu/submenu');
		} else {
			$this->session->set_flashdata('message', 
			'<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Input form tidak ada boleh yang kosong
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('menu/submenu');
		}
	}

}