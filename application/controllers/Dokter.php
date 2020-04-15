<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Rekam Medis';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('dokter/index', $data);
		$this->load->view('templates/footer');
	}

	public function getPendaftaranByNomor()
	{
		$nomor = $this->input->post('nomor');
		echo json_encode($this->db->get_where('pendaftaran', ['nomor_pendaftaran'=>$nomor])->row_array());
	}

	public function rekam_add($nomor_pendaftaran)
	{

		$data['title'] = 'Tambah Daftar Rekam Medis';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['pendaftaran'] = $this->db->get_where('pendaftaran', [
			'nomor_pendaftaran'=>$nomor_pendaftaran])->row_array();

		$this->form_validation->set_rules('nomor_rekam_medis', 'Nomor Rekam Medis', 'required|trim|is_unique[rekam_medis.nomor_rekam_medis]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('dokter/rekam_add', $data);
			$this->load->view('templates/footer');
		} else {

			$data = [
				'nomor_rekam_medis' => htmlspecialchars($this->input->post('nomor_rekam_medis', true)),
				'nomor_pendaftaran' => $data['pendaftaran']['nomor_pendaftaran'],
				'nama_pasien' => $data['pendaftaran']['nama'],
				'tanggal_berobat' => date('d/m/Y', time()),
				'nama_dokter' => $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array()['name'],
				'status' =>0
			];

			$this->db->insert('rekam_medis', $data);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data rekam medis berhasil ditambahkan
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('dokter/data_rekam');
		}
	}

	public function data_rekam()
	{
		$data['title'] = 'Data Rekam Medis';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['rekam_medis'] = $this->db->get('rekam_medis')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('dokter/data_rekam', $data);
		$this->load->view('templates/footer');
	}

	public function data_rekam_delete($id)
	{
		$this->db->delete('rekam_medis', ['id'=>$id]);
		$this->session->set_flashdata('message', 
		'<div class="alert alert-success alert-dismissible fade show" role="alert">
		  Data rekam medis berhasil dihapus
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('dokter/data_rekam');
	}

	public function data_rekam_edit($id)
	{

		$data['title'] = 'Ubah Data Rekam Medis';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['rekam_medis'] = $this->db->get_where('rekam_medis', ['id'=>$id])->row_array();

		$this->form_validation->set_rules('nomor_rekam_medis', 'Nomor Rekam Medis', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('dokter/rekam_edit', $data);
			$this->load->view('templates/footer');
		} else {

			$id = $this->input->post('id', true);

			$data = [
				'nomor_rekam_medis' => htmlspecialchars($this->input->post('nomor_rekam_medis', true)),
			];

			$this->db->where('id', $id);
			$this->db->update('rekam_medis', $data);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data rekam medis berhasil diubah
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('dokter/data_rekam');
		}
	}

	public function getAllPenyakit()
	{
		$keyword = $this->input->post('keyword');
		$result = $this->db->query("SELECT nama FROM penyakit WHERE nama LIKE '%$keyword%' ")->result_array();
		$row = [];
		foreach ($result as $single) {
			$row[] = $single['nama'];
		}

		echo json_encode($row);
	}

	public function getAllObat()
	{
		$keyword = $this->input->post('keyword');
		$result = $this->db->query("SELECT nama FROM obat WHERE nama LIKE '%$keyword%' ")->result_array();
		$row = [];
		foreach ($result as $single) {
			$row[] = $single['nama'];
		}

		echo json_encode($row);
	}

	public function rekam_finish($id)
	{
		$data['title'] = 'Hasil Pemeriksaan Rekam Medis';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['rekam_medis'] = $this->db->get_where('rekam_medis', ['id'=>$id])->row_array();

		$this->form_validation->set_rules('nomor_pemeriksaan', 'Nomor Pemeriksaan', 'required|trim|is_unique[detail_pemeriksaan.nomor_pemeriksaan]');
		$this->form_validation->set_rules('penyakit', 'Penyakit', 'required');
		$this->form_validation->set_rules('obat', 'Obat', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('dokter/rekam_hasil', $data);
			$this->load->view('templates/footer');
		} else {

			$this->db->where('nomor_rekam_medis', $data['rekam_medis']['nomor_rekam_medis']);
			$this->db->update('rekam_medis', ['status'=>1]);

			$data = [
				'nomor_rekam_medis' => $data['rekam_medis']['nomor_rekam_medis'],
				'nama_pasien' => $data['rekam_medis']['nama_pasien'],
				'tanggal_berobat' => $data['rekam_medis']['tanggal_berobat'],
				'nama_dokter' => $data['rekam_medis']['nama_dokter'],
				'nomor_pemeriksaan' => htmlspecialchars($this->input->post('nomor_pemeriksaan', true)),
				'nama_penyakit' => htmlspecialchars($this->input->post('penyakit')),
				'nama_obat' => htmlspecialchars($this->input->post('obat')),
				'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
			];

			$this->db->insert('detail_pemeriksaan', $data);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Hasil pemeriksaan pasien ' . $data['nama_pasien'] . ' telah selesai
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('dokter/pemeriksaan');
		}
	}

	public function pemeriksaan()
	{
		$data['title'] = 'Hasil Pemeriksaan';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['detail_pemeriksaan'] = $this->db->get('detail_pemeriksaan')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('dokter/pemeriksaan', $data);
		$this->load->view('templates/footer');
	}

	public function pemeriksaan_delete($id)
	{
		$this->db->delete('detail_pemeriksaan', ['id' => $id]);
		$this->session->set_flashdata('message', 
		'<div class="alert alert-success alert-dismissible fade show" role="alert">
		  Data pemeriksaan berhasil dihapus
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('dokter/pemeriksaan');
	}

	public function pemeriksaan_edit($id)
	{
		$data['title'] = 'Ubah Data Hasil Pemeriksaan';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['detail_pemeriksaan'] = $this->db->get_where('detail_pemeriksaan', ['id'=>$id])->row_array();

		$this->form_validation->set_rules('nomor_pemeriksaan', 'Nomor Pemeriksaan', 'required|trim');
		$this->form_validation->set_rules('penyakit', 'Penyakit', 'required');
		$this->form_validation->set_rules('obat', 'Obat', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('dokter/pemeriksaan_edit', $data);
			$this->load->view('templates/footer');
		} else {

			$id = $this->input->post('id');

			$data = [
				'nomor_pemeriksaan' => htmlspecialchars($this->input->post('nomor_pemeriksaan', true)),
				'nama_penyakit' => htmlspecialchars($this->input->post('penyakit')),
				'nama_obat' => htmlspecialchars($this->input->post('obat')),
				'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
			];

			$this->db->where('id', $id);
			$this->db->update('detail_pemeriksaan', $data);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data pemeriksaan pasien berhasil diubah
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('dokter/pemeriksaan');
		}
	}

	public function getDetail_pemeriksaan()
	{
		$id = $this->input->post('id');
		echo json_encode($this->db->get_where('detail_pemeriksaan', ['id'=>$id])->row_array());
	}

	public function rujukan($id)
	{
		$data['title'] = 'Rujuk pasien';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['rekam_medis'] = $this->db->get_where('rekam_medis', ['id'=>$id])->row_array();

		$this->form_validation->set_rules('penyakit', 'Penyakit', 'required');
		$this->form_validation->set_rules('obat', 'Obat', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('dokter/rujukan', $data);
			$this->load->view('templates/footer');
		} else {

			$this->db->where('nomor_rekam_medis', $data['rekam_medis']['nomor_rekam_medis']);
			$this->db->update('rekam_medis', ['status'=>1]);

			$data = [
				'nomor_rekam_medis' => $data['rekam_medis']['nomor_rekam_medis'],
				'nama_pasien' => $data['rekam_medis']['nama_pasien'],
				'tanggal_berobat' => $data['rekam_medis']['tanggal_berobat'],
				'nama_penyakit' => htmlspecialchars($this->input->post('penyakit')),
				'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
				'status' => 0
			];

			$this->db->insert('rujukan', $data);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Pasien ' . $data['nama_pasien'] . ' dalam proses rujukan
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('dokter/data_rekam');
		}
	}

	public function laboratorium($id)
	{
		$rekam_medis = $this->db->get_where('rekam_medis', ['id'=>$id])->row_array();

		$this->db->where('nomor_rekam_medis', $rekam_medis['nomor_rekam_medis']);
		$this->db->update('rekam_medis', ['status'=>1]);

		$data = [
			'dokter_pengirim' => $rekam_medis['nama_dokter'],
			'nomor_rekam_medis' => $rekam_medis['nomor_rekam_medis'],
			'nama_pasien' => $rekam_medis['nama_pasien'],
			'status' => 0
		];

		$this->db->insert('detail_laboratorium', $data);
		$this->session->set_flashdata('message', 
		'<div class="alert alert-success alert-dismissible fade show" role="alert">
		  Pasien ' . $data['nama_pasien'] . ' dalam proses pemeriksaan lab
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('dokter/data_rekam');
	}


}