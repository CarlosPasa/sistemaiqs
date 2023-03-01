<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadena_model extends MY_Model {

	public $table = 'cadena_custodia';

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

}

/* End of file Cadena_model.php */
/* Location: ./application/models/Cadena_model.php */