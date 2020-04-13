<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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
		$this->load->view('pendaftaran/index', $data);
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
			$this->load->view('pendaftaran/pasien_add', $data);
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
			redirect('pendaftaran');
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
		redirect('pendaftaran');
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
			$this->load->view('pendaftaran/pasien_edit', $data);
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
			redirect('pendaftaran');
		}
	}

	public function getDetail_pasien()
	{
		$id = $this->input->post('id', true);
		echo json_encode($this->db->get_where('pasien', ['id'=>$id])->row_array());
	}


	// -------------------------------Pendaftaran---------------------------------- 
	public function pendaftaran()
	{
		$data['title'] = 'Pendaftaran';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['pendaftarans'] = $this->db->get('pendaftaran')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pendaftaran/pendaftaran', $data);
		$this->load->view('templates/footer');
	}

	public function pendaftaran_add($id)
	{
		$data['title'] = 'Pendaftaran Pasien';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();

		$pasien = $this->db->get_where('pasien', ['id' => $id])->row_array();

		$this->form_validation->set_rules('nomor_pendaftaran','No Pendaftaran', 'required|trim');
		$this->form_validation->set_rules('biaya','Biaya', 'required|numeric');
		$this->form_validation->set_rules('tanggal_berobat','Tanggal Berobat', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pendaftaran/pendaftaran_add', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'nomor_pendaftaran' => htmlspecialchars($this->input->post('nomor_pendaftaran', true)),
				'biaya' => htmlspecialchars($this->input->post('biaya', true)),
				'tanggal_berobat' => htmlspecialchars($this->input->post('tanggal_berobat', true)),
				'nomor_pasien' => $pasien['nomor_pasien'],
				'nama' => $pasien['nama'],
				'alamat' => $pasien['alamat'],
				'jenis_kelamin' => $pasien['jenis_kelamin'],
				'nik' => $pasien['nik'],
				'tanggal_lahir' => $pasien['tanggal_lahir'],
				'kategori' => $pasien['kategori']
			];

			$this->db->insert('pendaftaran', $data);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Pasien berhasil didaftarkan
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('pendaftaran/pendaftaran');
		}	
	}

	public function pendaftaran_delete($id)
	{
		$this->db->delete('pendaftaran', ['id' => $id]);
		$this->session->set_flashdata('message', 
		'<div class="alert alert-success alert-dismissible fade show" role="alert">
		  Pendaftaran berhasil dihapus
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('pendaftaran/pendaftaran');
	}

	public function pendaftaran_edit($id)
	{
		$data['title'] = 'Ubah Pendaftaran';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['pendaftaran'] = $this->db->get_where('pendaftaran', ['id' => $id])->row_array();

		$this->form_validation->set_rules('nomor_pendaftaran','No Pendaftaran', 'required|trim');
		$this->form_validation->set_rules('biaya','Biaya', 'required|numeric');
		$this->form_validation->set_rules('tanggal_berobat','Tanggal Berobat', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pendaftaran/pendaftaran_edit', $data);
			$this->load->view('templates/footer');
		} else {

			$id = $this->input->post('id', true);

			$data = [
				'nomor_pendaftaran' => htmlspecialchars($this->input->post('nomor_pendaftaran', true)),
				'biaya' => htmlspecialchars($this->input->post('biaya', true)),
				'tanggal_berobat' => htmlspecialchars($this->input->post('tanggal_berobat', true))
			];

			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('pendaftaran');
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Pendaftaran berhasil diubah
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('pendaftaran/pendaftaran');
		}
	}

	public function getDetail_pendaftaran()
	{
		$id = $this->input->post('id', true);
		echo json_encode($this->db->get_where('pendaftaran', ['id'=>$id])->row_array());
	}

}