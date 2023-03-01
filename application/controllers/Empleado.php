<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Models
		$this->load->model('empleado_model');
		//Textos
		$this->page_data['page']->title = 'Empleados';
		$this->page_data['page']->menu = 'empleado';
		$this->page_data['titulo'] = "Empleados";
  		$this->page_data['subTitulo'] = "Administrar";
	}

	public function index()
	{
		ifPermissions('empleado_list');
  		$this->page_data['tablaTitulo'] = "Lista de Empleados";
		$this->page_data['empleados'] = $this->empleado_model->getActive();
		$this->load->view('empleado/empleado_l', $this->page_data);
	}

	public function edit($id)
	{
		ifPermissions('empleado_edit');
		$this->page_data['accion'] = "Editar empleado";
		$this->page_data['return_url'] = "empleado";
		$this->page_data['postAction'] = "empleado/editAction";
		$registro = $this->empleado_model->getById($id);
		$data = array(
					'id' => $registro->id,
					'txtNombreEmpleado' => $registro->nombre_empleado
		);
		$dataAdicional = array(			
		);
		$this->load->view('empleado/empleado_f', $this->page_data + $data + $dataAdicional);
	}

	public function editAction()
	{
		$id = $this->input->post('id');
		$data = array(
					'nombre_empleado' => $this->input->post('txtNombreEmpleado'),
					'updated_at' => date("Y-m-d H:i:s"),
		);
		$registro = $this->empleado_model->update($id, $data);
		$status = array(
						"STATUS"      =>"true",
						"mensaje"     =>"El registro se ha actualizado satisfactoriamente"
						);
		echo json_encode ($status);
	}

	public function deleteAction($id)
	{
		ifPermissions('empleado_delete');
		$id = $this->empleado_model->delete_logic($id);
		$this->activity_model->action_delete("Empleado", $id);
		$status = array(
						"STATUS"=>"true",
						"mensaje"=>"Registo eliminado satisfactoriamente",
						"redirect_url"=>site_url('empleado')
						);
		echo json_encode($status);
	}

	public function nuevoModal()
    {
		ifPermissions('empleado_add');
		$this->page_data['return_url'] = "empleado";
		$this->page_data['postAction'] = "empleado/nuevoModalAction";
        $data = array(
            'id'			=> "0",
			'txtNombreEmpleado'		=> ""
        );
		$dataAdicional = array(
        );
		$this->load->view('empleado/empleado_f_modal', $this->page_data + $data + $dataAdicional);
    }
	
	public function nuevoModalAction()
    {
		$data = array(
					'nombre_empleado' => $this->input->post('txtNombreEmpleado'),
					'estado' => '1'
 		);
		$empleado = $this->empleado_model->create($data);
		$this->activity_model->action_create("Empleados");
		$status = array(
						"STATUS"      =>"true",
						"mensaje"     =>"",
						"redirect_url" => 'empleado/edit/'.$empleado
						);
		echo json_encode ($status);
	}
}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */