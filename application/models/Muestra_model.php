<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muestra_model extends MY_Model {

	public $table = 'muestra';

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

	public function getTotalNumberMuestraRecords($idCadena){
		$this->db->from('muestra');
		$this->db->where('idCadenaCustodia', $idCadena);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getMuestrasByIdCadena($idCadena){
		$this->db->select("*");
		$this->db->select("DATE_FORMAT(fecha_hora, '%Y-%m-%d') as fecha");
		$this->db->select("DATE_FORMAT(fecha_hora,'%H:%i:%s') as hora");
		$this->db->from('muestra');
		$this->db->where('idCadenaCustodia', $idCadena);
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file Muestra_model.php */
/* Location: ./application/models/Muestra_model.php */