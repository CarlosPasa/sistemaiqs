<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orden extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Models
		$this->load->model('cadena_model');
		$this->load->library('form_validation');//cargo la libreria de validacion
		//Textos
		$this->page_data['page']->title = 'Ordenes';
		$this->page_data['page']->menu = 'cliente';
		$this->page_data['titulo'] = "Ordenes";
  		$this->page_data['subTitulo'] = "Administrar";
	}

	public function index()
	{
		ifPermissions('cadena_custodia_list');
  		$this->page_data['tablaTitulo'] = "Lista de Ordenes de ensayo";
		$this->page_data['cadena'] = $this->cadena_model->getAllCabecera();
		$this->load->view('orden/orden_l', $this->page_data);
	}

	public function edit($id)
	{
		ifPermissions('cliente_edit');
		$this->page_data['accion'] = "Editar cliente";
		$this->page_data['return_url'] = "cliente";
		$this->page_data['postAction'] = "cliente/editAction";
		$registro = $this->cliente_model->getById($id);
		$data = array(
					'id' => $registro->id,
					'txtNombreOrden' => $registro->nombre_cliente
		);
		$dataAdicional = array(			
		);
		$this->load->view('cliente/cliente_f', $this->page_data + $data + $dataAdicional);
	}

	public function editAction()
	{
		$id = $this->input->post('id');
		$data = array(
					'nombre_cliente' => $this->input->post('txtNombreOrden'),
					'updated_at' => date("Y-m-d H:i:s"),
		);
		$registro = $this->cliente_model->update($id, $data);
		$status = array(
						"STATUS"      =>"true",
						"mensaje"     =>"El registro se ha actualizado satisfactoriamente"
						);
		echo json_encode ($status);
	}

	public function deleteAction($id)
	{
		ifPermissions('cliente_delete');
		$id = $this->cliente_model->delete_logic($id);
		$this->activity_model->action_delete("Orden", $id);
		$status = array(
						"STATUS"=>"true",
						"mensaje"=>"Registo eliminado satisfactoriamente",
						"redirect_url"=>site_url('cliente')
						);
		echo json_encode($status);
	}

	public function nuevoModal()
    {
		ifPermissions('cliente_add');
		$this->page_data['return_url'] = "cliente";
		$this->page_data['postAction'] = "cliente/nuevoModalAction";
        $data = array(
            'id'			=> "0",
			'txtNombreOrden'		=> ""
        );
		$dataAdicional = array(
        );
		$this->load->view('cliente/cliente_f_modal', $this->page_data + $data + $dataAdicional);
    }
	
	public function nuevoModalAction()
    {
		$data = array(
					'nombre_cliente' => $this->input->post('txtNombreOrden'),
					'estado' => '1'
 		);		
		$config = array(
			array('field' => 'txtNombreOrden','label' => 'Nombre del Ordene', 'rules' => 'required')
		);
		$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE){
			$status = array(
				"STATUS"  =>"false",
				"mensaje" => validation_errors(),//muestra los mensaje de la validacion
				);
			echo json_encode ($status);
		}else{
			$cliente = $this->cliente_model->create($data);
			$this->activity_model->action_create("Ordenes");
			$status = array(
							"STATUS"      =>"true",
							"mensaje"     =>"",
							"redirect_url" => 'cliente/edit/'.$cliente
							);
			echo json_encode ($status);
		}
	}
}

/* End of file Orden.php */
/* Location: ./application/controllers/Orden.php */