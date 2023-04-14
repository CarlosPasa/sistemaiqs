<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends MY_Model {

	public $table = 'menu';

	public function __construct()
	{
		parent::__construct();
	}

	public function getValueByKey($key = '')
	{
		return ($query = $this->db->get_where($this->table, ['key' => $key], 1)) && $query->num_rows() > 0 ? $query->row()->value : null;
	}

	public function getByKey($key = '')
	{
		return ($query = $this->db->get_where($this->table, ['key' => $key], 1)) && $query->num_rows() > 0 ? $query->row() : null;
	}

	public function updateByKey($key, $value)
	{
		$this->db->where('key', $key);
		return $this->db->update($this->table, [
			'value' => $value
		]);
	}

	public function getMenusOrder()
	{
		$this->db->order_by("order", "asc");
		return $this->db->get($this->table)->result();
	}

	public function getMenusPadres()
	{
		$this->db->where('type_object','Menu');
		$this->db->order_by("order", "asc");
		return $this->db->get($this->table)->result();
	}

}

/* End of file Menu_model.php */
/* Location: ./application/models/Menu_model.php */