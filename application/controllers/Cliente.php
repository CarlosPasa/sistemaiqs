<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Models
		$this->load->model('cliente_model');
		$this->load->library('form_validation');//cargo la libreria de validacion
		//Textos
		$this->page_data['page']->title = 'Clientes';
		$this->page_data['page']->menu = 'cliente';
		$this->page_data['titulo'] = "Clientes";
  		$this->page_data['subTitulo'] = "Administrar";
	}

	public function index()
	{
		ifPermissions('cliente_list');
  		$this->page_data['tablaTitulo'] = "Lista de Clientes";
		$this->page_data['clientes'] = $this->cliente_model->getActive();
		$this->load->view('cliente/cliente_l', $this->page_data);
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
					'txtNombreCliente' => $registro->nombre_cliente
		);
		$dataAdicional = array(			
		);
		$this->load->view('cliente/cliente_f', $this->page_data + $data + $dataAdicional);
	}

	public function editAction()
	{
		$id = $this->input->post('id');
		$data = array(
					'nombre_cliente' => $this->input->post('txtNombreCliente'),
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
		$this->activity_model->action_delete("Cliente", $id);
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
			'txtNombreCliente'		=> ""
        );
		$dataAdicional = array(
        );
		$this->load->view('cliente/cliente_f_modal', $this->page_data + $data + $dataAdicional);
    }
	
	public function nuevoModalAction()
    {
		$data = array(
					'nombre_cliente' => $this->input->post('txtNombreCliente'),
					'estado' => '1'
 		);
		$cliente = $this->cliente_model->create($data);
		$this->activity_model->action_create("Clientes");
		$config = array(
			array('field' => 'txtNombreCliente','label' => 'Nombre del Cliente', 'rules' => 'required')
		);
		$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE){
			$status = array(
				"STATUS"  =>"false",
				"mensaje" => validation_errors(),//muestra los mensaje de la validacion
				);
			echo json_encode ($status);
		}else{
			$status = array(
							"STATUS"      =>"true",
							"mensaje"     =>"",
							"redirect_url" => 'cliente/edit/'.$cliente
							);
			echo json_encode ($status);
		}
	}
}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */