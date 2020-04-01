<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puskesmas_model extends CI_Model {

	public function getSubmenu()
	{
		$query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
				  FROM `user_sub_menu`
				  JOIN `user_menu`
				  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
				  ORDER BY `user_sub_menu`.`menu_id` ASC, `user_sub_menu`.`id`
		";

		return $this->db->query($query)->result_array();
	}

	public function getSubmenu_single($id)
	{
		$query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
				  FROM `user_sub_menu`
				  JOIN `user_menu`
				  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
				  WHERE `user_sub_menu`.`id` = $id
		";

		return $this->db->query($query)->row_array();
	}

}