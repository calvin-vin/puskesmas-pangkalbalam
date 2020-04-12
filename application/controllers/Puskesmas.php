<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puskesmas extends CI_Controller {

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
		$this->load->view('puskesmas/pendaftaran', $data);
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
			$this->load->view('puskesmas/pendaftaran_add', $data);
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
			redirect('puskesmas/pendaftaran');
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
		redirect('puskesmas/pendaftaran');
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
			$this->load->view('puskesmas/pendaftaran_edit', $data);
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
			redirect('puskesmas/pendaftaran');
		}
	}

	public function getDetail_pendaftaran()
	{
		$id = $this->input->post('id', true);
		echo json_encode($this->db->get_where('pendaftaran', ['id'=>$id])->row_array());
	}

	// ------------------------------Obat---------------------------------
	public function obat()
	{
		$data['title'] = 'Obat';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['obats'] = $this->db->get('obat')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('puskesmas/obat', $data);
		$this->load->view('templates/footer');
	}

	public function obat_add() 
	{
		$data['title'] = 'Tambah Obat';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nomor_obat','No Obat', 'required|trim');
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
			redirect('puskesmas/obat');
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
		redirect('puskesmas/obat');
	}

	public function obat_edit($id) 
	{
		$data['title'] = 'Ubah Obat';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['obat'] = $this->db->get_where('obat', ['id'=>$id])->row_array();

		$this->form_validation->set_rules('nomor_obat','No Obat', 'required|trim');
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
			redirect('puskesmas/obat');
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

		$this->form_validation->set_rules('nomor_penyakit','No Penyakit', 'required|trim');
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

		$this->form_validation->set_rules('nomor_penyakit','No Penyakit', 'required|trim');
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