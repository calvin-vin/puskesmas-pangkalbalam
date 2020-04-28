<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Puskesmas_model', 'puskesmas');
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['pasien_harian'] = $this->puskesmas->getPasienHarian();
		$data['pasien_bulanan'] = $this->puskesmas->getPasienBulanan();
		$data['pasien_tahunan'] = $this->puskesmas->getPasienTahunan();

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


	// --------------------user management-----------------------

	public function user()
	{
		$data['title'] = 'Manajemen Pengguna';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['all_user'] = $this->puskesmas->getAllUsers();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/user', $data);
		$this->load->view('templates/footer');
	}

	public function user_add()
	{
		$data['title'] = 'Tambah Pengguna';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();

		$this->db->order_by('id', 'DESC');
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('name', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email sudah digunakan'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password2]', [
			'min_length' => 'Password minimal 6 karakter',
			'matches' => 'Konfirmasi password tidak sesuai'
		]);
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|min_length[6]|matches[password]');
		$this->form_validation->set_rules('role_id', 'Role', 'required|trim');
		$this->form_validation->set_rules('section', 'Bagian', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/user_add', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
				'role_id' => htmlspecialchars($this->input->post('role_id', true)),
				'section' => htmlspecialchars($this->input->post('section', true)),
				'image' => 'default.png',
				'is_active' => 1,
				'date_created' => time(),
				'last_login' => time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Pengguna baru berhasil ditambahkan
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('admin/user');
		}
	}

	public function user_delete($id)
	{
		$this->db->delete('user', ['id' => $id]);
		$this->session->set_flashdata('message', 
		'<div class="alert alert-success alert-dismissible fade show" role="alert">
		  Pengguna berhasil dihapus
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/user');
	}

	public function user_edit($id)
	{
		$data['title'] = 'Ubah Pengguna';
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')])->row_array();
		$data['user_id'] = $this->db->get_where('user', ['id' => $id])->row_array();

		$this->db->order_by('id', 'DESC');
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('name', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email', [
			'is_unique' => 'Email sudah digunakan'
		]);
		$this->form_validation->set_rules('role_id', 'Role', 'required|trim');
		$this->form_validation->set_rules('section', 'Bagian', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/user_edit', $data);
			$this->load->view('templates/footer');
		} else {

			$id = $this->input->post('id', true);

			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'role_id' => htmlspecialchars($this->input->post('role_id', true)),
				'section' => htmlspecialchars($this->input->post('section', true)),
			];

			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('user');
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Pengguna berhasil diubah
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('admin/user');
		}
	}

	public function changeuseractive()
	{
		$id = $this->input->post('id', true);

		$active = $this->db->get_where('user', ['id' => $id, 'is_active' => 1]);

		if ($active->num_rows() > 0) {
			$this->db->set('is_active', 0);
			$user_active = 'dinonaktif';
		} else {
			$this->db->set('is_active', 1);
			$user_active = 'aktif';
		}

		$this->db->where('id', $id);
		$this->db->update('user');

		$this->session->set_flashdata('message', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Akun berhasil ' . $user_active . '
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
	}

	public function getDetail_user()
	{
		$id = $this->input->post('id', true);
		echo json_encode($this->puskesmas->getUserDetail($id));
	}

	public function getPasienMei()
	{
		$result = $this->db->query("SELECT id FROM user")->result_array();
		$row = [];
		foreach ($result as $single) {
			$row[] = $single['id'];
		}

		echo json_encode($row);
	}

}