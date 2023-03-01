<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadena_custodia extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Models
		$this->load->model('obra_model');
		$this->load->model('cliente_model');
		$this->load->model('empleado_model');
		$this->load->model('proyecto_model');
		//Textos
		$this->page_data['page']->title = 'Cadena de Custodia';
		$this->page_data['page']->menu = 'cadeba custodia';
		$this->page_data['titulo'] = "Cadena de Custodia";
  		$this->page_data['subTitulo'] = "Administrar";
	}

	public function index()
	{
		ifPermissions('cadena_custodia_list');
  		$this->page_data['tablaTitulo'] = "Lista de Cadena de custodias";
		$this->page_data['obra'] = $this->obra_model->getActive();
		$this->load->view('cadena_custodia/cadena_custodia_l', $this->page_data);
	}

	public function nuevo()
	{
		ifPermissions('cadena_custodia_add');
		$this->page_data['accion'] = "Cadena de custodia 202302";
		$this->page_data['return_url'] = "cadena_custodia";
		$this->page_data['postAction'] = "cadena_custodia/nuevoAction";
		$data = array(
					'id' => "0",
					'cbCliente' => "",
					'cbProyecto' => "",
					'txtDireccion'=>"",
					'txtDistrito'=>"",
					'txtProvincia'=>"Talara",
					'txtDepartamento'=>"Piura",
					'txtEmail'=>"",
					'txtTelefono'=>"",
					'txtCelular'=>"",
					'txtFecha'=>"",
					'chkCliente'=>"",
					'chkIQS'=>"",
					'cbEmpleado'=>"",
					'txtAntecedentes'=>"",
					'cliente_data' => $this->cliente_model->getActive(),
					'empleado_data' => $this->empleado_model->getActive(),
					'proyecto_data' => $this->proyecto_model->getActive()
				);
		$this->load->view('cadena_custodia/cadena_custodia_f', $this->page_data + $data);
	}

	public function nuevoAction()
	{
		ifPermissions('cadena_custodia_add');
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
		redirect('cadena_custodia');
	}

	public function edit($id)
	{
		ifPermissions('cadena_custodia_edit');
		$this->page_data['accion'] = "Editar cadena_custodia";
		$this->page_data['return_url'] = "cadena_custodia";
		$this->page_data['postAction'] = "cadena_custodia/editAction";
		$registro = $this->obra_model->getById($id);
		$data = array(
					'id' => $registro->id,
					'txtNombre' => $registro->o_nombre,
					'txtMonto' => $registro->o_monto
				);
		$this->load->view('cadena_custodia/cadena_custodia_f', $this->page_data + $data);
	}

	public function editAction()
	{
		ifPermissions('cadena_custodia_edit');
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
		ifPermissions('cadena_custodia_delete');
		$id = $this->obra_model->delete_logic($id);
		$this->activity_model->action_delete("Obra", $id);
		$status = array(
						"STATUS"=>"true",
						"mensaje"=>"Registo eliminado satisfactoriamente",
						"redirect_url"=>site_url('cadena_custodia')
						);
		echo json_encode($status);
	}


}

/* End of file Cadena_custodia.php */
/* Location: ./application/controllers/cadena_custodia.php */