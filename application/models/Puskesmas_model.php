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

	public function getAllUsers()
	{

		$query = "SELECT `user`.*, `user_role`.`role`
				  FROM `user`
				  JOIN `user_role`
				  ON `user`.`role_id` = `user_role`.`id`
				  ORDER BY `user`.`role_id` ASC, `user`.`name` ASC
		";

		return $this->db->query($query)->result_array();
	}

	public function getUserDetail($id)
	{
		$query = "SELECT `user`.`name`, `user`.`email`, `user`.`section`, `user`.`image`,
				  `user`.`date_created`, `user`.`last_login`, `user_role`.`role`
				  FROM `user`
				  JOIN `user_role`
				  ON `user`.`role_id` = `user_role`.`id`
				  WHERE `user`.`id` = $id
		";

		return $this->db->query($query)->row_array();
	}

	public function getPasienHarian()
	{
		date_default_timezone_set('Asia/Jakarta');
		$day = date('d/m/Y', time());
		$query = "SELECT tanggal_berobat
				  FROM rekam_medis WHERE tanggal_berobat = '$day'";
		return $this->db->query($query)->num_rows();
	}

	public function getPasienBulanan()
	{
		date_default_timezone_set('Asia/Jakarta');
		$month = date('m/Y', time());
		$query = "SELECT SUBSTRING(tanggal_berobat, 4, 7)
				  FROM rekam_medis WHERE SUBSTRING(tanggal_berobat, 4, 7) = '$month'";
		return $this->db->query($query)->num_rows();
	}

	public function getPasienTahunan()
	{
		date_default_timezone_set('Asia/Jakarta');
		$year = date('Y', time());
		$query = "SELECT SUBSTRING(tanggal_berobat, 7, 4)
				  FROM rekam_medis WHERE SUBSTRING(tanggal_berobat, 7, 4) = '$year'";
		return $this->db->query($query)->num_rows();
	}

}