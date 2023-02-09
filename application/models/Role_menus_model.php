<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_menus_model extends MY_Model {

	public $table = 'role_menus';

	public function __construct()
	{
		parent::__construct();
	}

	public function getMenus($role)
	{
		$this->db->select("menu.*");
		$this->db->from('menu')
			->join('role_menus', 'menu.name = role_menus.menu','left');
		$this->db->where('role_menus.role',$role);
		$this->db->order_by("menu.order", "asc");
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

}

/* End of file Role_menus_model.php */
/* Location: ./application/models/Role_menus_model.php */