<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rujukan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Belum Dirujuk';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['rujukans'] = $this->db->get_where('rujukan', ['status'=>0])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('rujukan/index', $data);
		$this->load->view('templates/footer');
	}

	public function rujuk($id)
	{
		$data['title'] = 'Rujuk Pasien';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['rujukan'] = $this->db->get_where('rujukan', ['id'=>$id])->row_array();

		$this->form_validation->set_rules('nomor_rujukan', 'Nomor Rujukan', 'required|trim|is_unique[rujukan.nomor_rujukan]');
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('rujukan/rujuk', $data);
			$this->load->view('templates/footer');
		} else {

			$id = $this->input->post('id', true);

			$data = [
				'tujuan' => htmlspecialchars($this->input->post('tujuan', true)),
				'nomor_rujukan' => htmlspecialchars($this->input->post('nomor_rujukan', true)),
				'nama_petugas' => $data['user']['name'],
				'status' => 1
			];

			$this->db->where('id', $id);
			$this->db->update('rujukan', $data);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Pasien telah dirujuk
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('rujukan/telah_dirujuk');
		}
	}

	public function telah_dirujuk()
	{
		$data['title'] = 'Telah Dirujuk';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['rujukans'] = $this->db->get_where('rujukan', ['status'=>1])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('rujukan/telah_dirujuk', $data);
		$this->load->view('templates/footer');
	}

	public function getDetail_rujukan()
	{
		$id = $this->input->post('id');
		echo json_encode($this->db->get_where('rujukan', ['id'=>$id])->row_array());
	}

	public function rujukan_edit($id)
	{
		$data['title'] = 'Ubah Rujukan Pasien';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['rujukan'] = $this->db->get_where('rujukan', ['id'=>$id])->row_array();

		$this->form_validation->set_rules('nomor_rujukan', 'Nomor Rujukan', 'required|trim');
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('rujukan/rujukan_edit', $data);
			$this->load->view('templates/footer');
		} else {

			$id = $this->input->post('id', true);

			$data = [
				'tujuan' => htmlspecialchars($this->input->post('tujuan', true)),
				'nomor_rujukan' => htmlspecialchars($this->input->post('nomor_rujukan', true)),
			];

			$this->db->where('id', $id);
			$this->db->update('rujukan', $data);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Rujukan pasien berhasil diubah
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('rujukan/telah_dirujuk');
		}
	}

	public function rujukan_delete($id)
	{
		$this->db->delete('rujukan', ['id' => $id]);
		$this->session->set_flashdata('message', 
		'<div class="alert alert-success alert-dismissible fade show" role="alert">
		  Data rujukan berhasil dihapus
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('rujukan/telah_dirujuk');
	}
}