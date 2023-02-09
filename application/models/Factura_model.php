<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Factura_model extends MY_Model {

	public $table = 'factura';

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

	public function getDetalle($idFactura)
	{
		$this->db->select('factura_detalle.*');
		$this->db->select('producto.nombre as "producto.nombre"');
		$this->db->from('factura_detalle')
			->join('producto', 'factura_detalle.id_producto = producto.id','left');
		$this->db->where('factura_detalle.estado','1');
		$this->db->where('factura_detalle.id_factura',$idFactura);
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Factura_model.php */
/* Location: ./application/models/Factura_model.php */