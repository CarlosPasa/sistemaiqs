<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Models
		$this->load->model('proyecto_model');
		//Textos
		$this->page_data['page']->title = 'Proyectos';
		$this->page_data['page']->menu = 'proyecto';
		$this->page_data['titulo'] = "Proyectos";
  		$this->page_data['subTitulo'] = "Administrar";
	}

	public function index()
	{
		ifPermissions('proyecto_list');
  		$this->page_data['tablaTitulo'] = "Lista de Proyectos";
		$this->page_data['proyectos'] = $this->proyecto_model->getActive();
		$this->load->view('proyecto/proyecto_l', $this->page_data);
	}

	public function edit($id)
	{
		ifPermissions('proyecto_edit');
		$this->page_data['accion'] = "Editar proyecto";
		$this->page_data['return_url'] = "proyecto";
		$this->page_data['postAction'] = "proyecto/editAction";
		$registro = $this->proyecto_model->getById($id);
		$data = array(
					'id' => $registro->id,
					'txtNombreProyecto' => $registro->nombre_proyecto
		);
		$dataAdicional = array(			
		);
		$this->load->view('proyecto/proyecto_f', $this->page_data + $data + $dataAdicional);
	}

	public function editAction()
	{
		$id = $this->input->post('id');
		$data = array(
					'nombre_proyecto' => $this->input->post('txtNombreProyecto'),
					'updated_at' => date("Y-m-d H:i:s"),
		);
		$registro = $this->proyecto_model->update($id, $data);
		$status = array(
						"STATUS"      =>"true",
						"mensaje"     =>"El registro se ha actualizado satisfactoriamente"
						);
		echo json_encode ($status);
	}

	public function deleteAction($id)
	{
		ifPermissions('proyecto_delete');
		$id = $this->proyecto_model->delete_logic($id);
		$this->activity_model->action_delete("Proyecto", $id);
		$status = array(
						"STATUS"=>"true",
						"mensaje"=>"Registo eliminado satisfactoriamente",
						"redirect_url"=>site_url('proyecto')
						);
		echo json_encode($status);
	}

	public function nuevoModal()
    {
		ifPermissions('proyecto_add');
		$this->page_data['return_url'] = "proyecto";
		$this->page_data['postAction'] = "proyecto/nuevoModalAction";
        $data = array(
            'id'			=> "0",
			'txtNombreProyecto'		=> ""
        );
		$dataAdicional = array(
        );
		$this->load->view('proyecto/proyecto_f_modal', $this->page_data + $data + $dataAdicional);
    }
	
	public function nuevoModalAction()
    {
		$data = array(
					'nombre_proyecto' => $this->input->post('txtNombreProyecto'),
					'estado' => '1'
 		);
		$proyecto = $this->proyecto_model->create($data);
		$this->activity_model->action_create("Proyectos");
		$status = array(
						"STATUS"      =>"true",
						"mensaje"     =>"",
						"redirect_url" => 'proyecto/edit/'.$proyecto
						);
		echo json_encode ($status);
	}
}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */