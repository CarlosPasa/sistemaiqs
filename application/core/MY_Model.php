<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	public $table_key = 'id';

	public function get()
	{
		return $this->db->get($this->table)->result();
	}

	public function getActive()
	{
		return $this->db->get_where($this->table, ['estado' => '1'])->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->table, [ $this->table_key => $id ])->row();
	}

	function create($data)
	{
		
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();

	}

	function create_batch($data)
	{
		
		$this->db->insert_batch($this->table, $data);
		return $this->db->insert_id();

	}

	function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
		return $id;
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
		return true;
	}

	function delete_logic($id)
	{
		$data =  array(
				'estado' => '0'
				);
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
		return true;
	}

	public function getByWhere($whereArg, $args = [])
	{

		if(isset($args['order']))
			$this->db->order_by($args['order'][0], $args['order'][1]);
		
		return $this->db->get_where($this->table, $whereArg)->result();
	}

	public function predictId()
	{
		$this->db->order_by($this->table_key, 'desc');
		return ($query = $this->db->get_where($this->table)) && $query->num_rows() > 0 ? $query->row()->id + 1 : 1;
	}

	public function countAll()
	{
		return $this->db->count_all_results($this->table);
	}

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */