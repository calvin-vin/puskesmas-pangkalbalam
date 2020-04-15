<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorium extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Belum Diperiksa';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['detail_laboratorium'] = $this->db->get_where('detail_laboratorium', ['status'=>0])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('laboratorium/index', $data);
		$this->load->view('templates/footer');
	}

	public function periksa($id)
	{
		$data['title'] = 'Pemeriksaan Pasien';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['detail_laboratorium'] = $this->db->get_where('detail_laboratorium', ['id'=>$id])->row_array();

		$this->form_validation->set_rules('nomor_laboratorium', 'Nomor Laboratorium', 'required|trim|is_unique[detail_laboratorium.nomor_laboratorium]');
		$this->form_validation->set_rules('hasil_pemeriksaan', 'Hasil Pemeriksaan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('laboratorium/periksa', $data);
			$this->load->view('templates/footer');
		} else {

			$id = $this->input->post('id', true);

			$data = [
				'nomor_laboratorium' => htmlspecialchars($this->input->post('nomor_laboratorium', true)),
				'hasil_pemeriksaan' => htmlspecialchars($this->input->post('hasil_pemeriksaan', true)),
				'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
				'tanggal_pemeriksaan' => date('d/m/Y', time()),
				'nama_petugas' => $data['user']['name'],
				'status' => 1
			];

			$this->db->where('id', $id);
			$this->db->update('detail_laboratorium', $data);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Pasien telah diperiksa
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('laboratorium/telah_diperiksa');
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
	

	public function telah_diperiksa()
	{
		$data['title'] = 'Telah Diperiksa';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['detail_laboratorium'] = $this->db->get_where('detail_laboratorium', ['status'=>1])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('laboratorium/telah_diperiksa', $data);
		$this->load->view('templates/footer');
	}

	public function getDetail_laboratorium()
	{
		$id = $this->input->post('id');
		echo json_encode($this->db->get_where('detail_laboratorium', ['id'=>$id])->row_array());
	}

	public function periksa_edit($id)
	{
		$data['title'] = 'Ubah Pemeriksaan Pasien';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['detail_laboratorium'] = $this->db->get_where('detail_laboratorium', ['id'=>$id])->row_array();

		$this->form_validation->set_rules('nomor_laboratorium', 'Nomor Laboratorium', 'required|trim');
		$this->form_validation->set_rules('hasil_pemeriksaan', 'Hasil Pemeriksaan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('laboratorium/periksa_edit', $data);
			$this->load->view('templates/footer');
		} else {

			$id = $this->input->post('id', true);
			
			$data = [
				'nomor_laboratorium' => htmlspecialchars($this->input->post('nomor_laboratorium', true)),
				'hasil_pemeriksaan' => htmlspecialchars($this->input->post('hasil_pemeriksaan', true)),
				'keterangan' => htmlspecialchars($this->input->post('keterangan', true))
			];

			$this->db->where('id', $id);
			$this->db->update('detail_laboratorium', $data);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data pemeriksaan berhasil diubah
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('laboratorium/telah_diperiksa');
		}
	}

	public function periksa_delete($id)
	{
		$this->db->delete('detail_laboratorium', ['id' => $id]);
		$this->session->set_flashdata('message', 
		'<div class="alert alert-success alert-dismissible fade show" role="alert">
		  Data pemeriksaan berhasil dihapus
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('laboratorium/telah_diperiksa');
	}
}