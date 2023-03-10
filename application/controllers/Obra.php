<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obra extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Models
		$this->load->model('obra_model');
		//Textos
		$this->page_data['page']->title = 'Obras';
		$this->page_data['page']->menu = 'obras';
		$this->page_data['titulo'] = "Obras";
  		$this->page_data['subTitulo'] = "Administrar";
	}

	public function index()
	{
		ifPermissions('obra_list');
  		$this->page_data['tablaTitulo'] = "Lista de Obras";
		$this->page_data['obra'] = $this->obra_model->getActive();
		$this->load->view('obra/obra_l', $this->page_data);
	}

	public function nuevo()
	{
		ifPermissions('obra_add');
		$this->page_data['accion'] = "Nuevo obra";
		$this->page_data['return_url'] = "obra";
		$this->page_data['postAction'] = "obra/nuevoAction";
		$data = array(
					'id' => "0",
					'txtNombre' => "",
					'txtMonto' => ""
				);
		$this->load->view('obra/obra_f', $this->page_data + $data);
	}

	public function nuevoAction()
	{
		ifPermissions('obra_add');
		postAllowed();
		$obra = $this->obra_model->create([
			'o_nombre' => $this->input->post('txtNombre'),
			'o_monto' => $this->input->post('txtMonto'),
			'created_at' => date("Y-m-d H:i:s"),
			'estado' => '1'
		]);
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Nuevo registro creado');
		$this->activity_model->action_create("Obra");
		redirect('obra');
	}

	public function edit($id)
	{
		ifPermissions('obra_edit');
		$this->page_data['accion'] = "Editar obra";
		$this->page_data['return_url'] = "obra";
		$this->page_data['postAction'] = "obra/editAction";
		$registro = $this->obra_model->getById($id);
		$data = array(
					'id' => $registro->id,
					'txtNombre' => $registro->o_nombre,
					'txtMonto' => $registro->o_monto
				);
		$this->load->view('obra/obra_f', $this->page_data + $data);
	}

	public function editAction()
	{
		ifPermissions('obra_edit');
		postAllowed();
		$id = $this->input->post('id');
		$data = [
			'o_nombre' => $this->input->post('txtNombre'),
			'o_monto' => $this->input->post('txtMonto'),
			'updated_at' => date("Y-m-d H:i:s"),
		];
		$registro = $this->obra_model->update($id, $data);
		$this->activity_model->action_edit("Obra", $id);
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Registro actualizado satisfactoriamente');
		redirect('obra');
	}

	public function deleteAction($id)
	{
		ifPermissions('obra_delete');
		$id = $this->obra_model->delete_logic($id);
		$this->activity_model->action_delete("Obra", $id);
		$status = array(
						"STATUS"=>"true",
						"mensaje"=>"Registo eliminado satisfactoriamente",
						"redirect_url"=>site_url('obra')
						);
		echo json_encode($status);
	}


}

/* End of file Obra.php */
/* Location: ./application/controllers/Obra.php */