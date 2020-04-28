<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puskesmas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}	

	// ------------------------------Obat---------------------------------
	public function index()
	{
		$data['title'] = 'Obat';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['obats'] = $this->db->get('obat')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('puskesmas/index', $data);
		$this->load->view('templates/footer');
	}

	public function obat_add() 
	{
		$data['title'] = 'Tambah Obat';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nomor_obat','Nomor Obat', 'required|trim');
		$this->form_validation->set_rules('nama','Nama Obat', 'required|trim');
		$this->form_validation->set_rules('jenis','Jenis Obat', 'required|trim');
		$this->form_validation->set_rules('tanggal_masuk','Tanggal Masuk Obat', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('puskesmas/obat_add', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'nomor_obat' => htmlspecialchars($this->input->post('nomor_obat', true)),
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'jenis' => htmlspecialchars($this->input->post('jenis', true)),
				'tanggal_masuk' => htmlspecialchars($this->input->post('tanggal_masuk', true)),
				'stok' => htmlspecialchars($this->input->post('stok', true))
			];

			$this->db->insert('obat', $data);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data obat berhasil ditambahkan
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('puskesmas');
		}	
	}

	public function obat_delete($id)
	{
		$this->db->delete('obat', ['id' => $id]);
		$this->session->set_flashdata('message', 
		'<div class="alert alert-success alert-dismissible fade show" role="alert">
		  Data obat berhasil dihapus
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('puskesmas');
	}

	public function obat_edit($id) 
	{
		$data['title'] = 'Ubah Obat';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['obat'] = $this->db->get_where('obat', ['id'=>$id])->row_array();

		$this->form_validation->set_rules('nomor_obat','Nomor Obat', 'required|trim');
		$this->form_validation->set_rules('nama','Nama Obat', 'required|trim');
		$this->form_validation->set_rules('jenis','Jenis Obat', 'required|trim');
		$this->form_validation->set_rules('tanggal_masuk','Tanggal Masuk Obat', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('puskesmas/obat_edit', $data);
			$this->load->view('templates/footer');
		} else {

			$id = $this->input->post('id', true);

			$data = [
				'nomor_obat' => htmlspecialchars($this->input->post('nomor_obat', true)),
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'jenis' => htmlspecialchars($this->input->post('jenis', true)),
				'tanggal_masuk' => htmlspecialchars($this->input->post('tanggal_masuk', true)),
				'stok' => htmlspecialchars($this->input->post('stok', true))
			];

			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('obat');
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data obat berhasil diubah
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('puskesmas');
		}	
	}


	// --------------------------------Penyakit----------------------------
	public function penyakit()
	{
		$data['title'] = 'Penyakit';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['penyakits'] = $this->db->get('penyakit')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('puskesmas/penyakit', $data);
		$this->load->view('templates/footer');
	}

	public function penyakit_add() 
	{
		$data['title'] = 'Tambah Data Penyakit';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nomor_penyakit','Nomor Penyakit', 'required|trim');
		$this->form_validation->set_rules('kode','Kode ICD X', 'required|trim');
		$this->form_validation->set_rules('nama','Nama Penyakit', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('puskesmas/penyakit_add', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'nomor_penyakit' => htmlspecialchars($this->input->post('nomor_penyakit', true)),
				'kode' => htmlspecialchars($this->input->post('kode', true)),
				'nama' => htmlspecialchars($this->input->post('nama', true))
			];

			$this->db->insert('penyakit', $data);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data penyakit berhasil ditambahkan
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('puskesmas/penyakit');
		}	
	}

	public function penyakit_delete($id)
	{
		$this->db->delete('penyakit', ['id' => $id]);
		$this->session->set_flashdata('message', 
		'<div class="alert alert-success alert-dismissible fade show" role="alert">
		  Data penyakit berhasil dihapus
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('puskesmas/penyakit');
	}

	public function penyakit_edit($id) 
	{
		$data['title'] = 'Tambah Data Penyakit';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['penyakit'] = $this->db->get_where('penyakit', ['id'=>$id])->row_array();

		$this->form_validation->set_rules('nomor_penyakit','Nomor Penyakit', 'required|trim');
		$this->form_validation->set_rules('kode','Kode ICD X', 'required|trim');
		$this->form_validation->set_rules('nama','Nama Penyakit', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('puskesmas/penyakit_edit', $data);
			$this->load->view('templates/footer');
		} else {

			$id = $this->input->post('id', true);

			$data = [
				'nomor_penyakit' => htmlspecialchars($this->input->post('nomor_penyakit', true)),
				'kode' => htmlspecialchars($this->input->post('kode', true)),
				'nama' => htmlspecialchars($this->input->post('nama', true))
			];

			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('penyakit');
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data penyakit berhasil diubah
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('puskesmas/penyakit');
		}	
	}

}