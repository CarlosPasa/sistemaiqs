<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analisis_model extends MY_Model {

	public $table = 'analisis';

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
	public function getTotalNumberMuestraRecords($idMuestra){
		$this->db->from('analisis');
		$this->db->where('idMuestra', $idMuestra);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getAnalisisByidMuestra($idMuestra){
		$this->db->select("*");
		$this->db->from('analisis');
		$this->db->where('idMuestra', $idMuestra);
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Analisis_model.php */
/* Location: ./application/models/Analisis_model.php */