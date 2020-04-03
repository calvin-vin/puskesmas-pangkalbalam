<?php 

function is_logged_in()
{
	$ci = get_instance();
	
	if (!$ci->session->userdata('email')) {
		redirect('auth');
	} else {

		$role_id = $ci->session->userdata('role_id');
		$menu = $ci->uri->segment(1);
		$menu_id = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array()['id'];
		$access = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

		if ($access->num_rows() < 1) {
			redirect('auth/blocked');
		} 
	}
}

function checked($menu_id, $role_id)
{
	$ci = get_instance();

	$access = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

	if ($access->num_rows() > 0) {
		return 'checked="checked"';
	}

}