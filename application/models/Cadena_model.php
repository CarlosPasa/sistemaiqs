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

	public function getAllCabecera()
	{
		$this->db->select("cadena_custodia.id as id ,cadena_custodia.distrito");
		$this->db->select("DATE_FORMAT(fecha,'%d/%m/%Y') as fecha");
		$this->db->select('cliente.nombre_cliente as cliente');
		$this->db->select('empleado.nombre_empleado as empleado');
		$this->db->from('cadena_custodia')
			->join('cliente', 'cadena_custodia.id_cliente = cliente.id  ','inner')
            ->join('empleado', 'cadena_custodia.id_empleado = empleado.id','inner');
		$this->db->where('cadena_custodia.estado','1');
		$this->db->group_by('cadena_custodia.id');
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Cadena_model.php */
/* Location: ./application/models/Cadena_model.php */