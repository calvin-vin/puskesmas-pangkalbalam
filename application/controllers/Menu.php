<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

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

}