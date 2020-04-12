<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puskesmas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Puskesmas_model', 'puskesmas');
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Pasien';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['pasiens'] = $this->db->get('pasien')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('puskesmas/index', $data);
		$this->load->view('templates/footer');
	}

	public function pasien_add()
	{
		$data['title'] = 'Pasien';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nomor_pasien','No Pasien', 'required|trim');
		$this->form_validation->set_rules('nik','NIK', 'required|numeric|max_length[16]');
		$this->form_validation->set_rules('nama','Nama', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('kategori','Kategori', 'required|trim');
		$this->form_validation->set_rules('hp','No. Hp', 'required|trim|max_length[15]');
		$this->form_validation->set_rules('alamat','Alamat', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('puskesmas/pasien_add', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'nomor_pasien' => htmlspecialchars($this->input->post('nomor_pasien', true)),
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
				'nik' => htmlspecialchars($this->input->post('nik', true)),
				'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir', true)),
				'kategori' => htmlspecialchars($this->input->post('kategori', true)),
				'hp' => htmlspecialchars($this->input->post('hp', true)),
			];

			$this->db->insert('pasien', $data);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Pasien berhasil ditambahkan
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('puskesmas');
		}	
	}

	public function pasien_delete($id)
	{
		$this->db->delete('pasien', ['id' => $id]);
		$this->session->set_flashdata('message', 
		'<div class="alert alert-success alert-dismissible fade show" role="alert">
		  Pasien berhasil dihapus
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('puskesmas');
	}

	public function pasien_edit($id)
	{
		$data['title'] = 'Ubah Pasien';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['pasien'] = $this->db->get_where('pasien', ['id' => $id])->row_array();

		$this->form_validation->set_rules('nomor_pasien','No Pasien', 'required|trim');
		$this->form_validation->set_rules('nik','NIK', 'required|numeric|max_length[16]');
		$this->form_validation->set_rules('nama','Nama', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('kategori','Kategori', 'required|trim');
		$this->form_validation->set_rules('hp','No. Hp', 'required|trim|max_length[15]');
		$this->form_validation->set_rules('alamat','Alamat', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('puskesmas/pasien_edit', $data);
			$this->load->view('templates/footer');
		} else {

			$id = $this->input->post('id', true);

			$data = [
				'nomor_pasien' => htmlspecialchars($this->input->post('nomor_pasien', true)),
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
				'nik' => htmlspecialchars($this->input->post('nik', true)),
				'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir', true)),
				'kategori' => htmlspecialchars($this->input->post('kategori', true)),
				'hp' => htmlspecialchars($this->input->post('hp', true)),
			];

			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('pasien');
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Pasien berhasil diubah
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('puskesmas');
		}
	}

	public function getDetail_pasien()
	{
		$id = $this->input->post('id', true);
		echo json_encode($this->db->get_where('pasien', ['id'=>$id])->row_array());
	}

}