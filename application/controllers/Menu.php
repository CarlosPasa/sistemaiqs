<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Models
		$this->load->model('menu_model');
		//Textos
		$this->page_data['page']->title = 'Menus';
		$this->page_data['page']->menu = 'menus';
		$this->page_data['titulo'] = "Menus";
  		$this->page_data['subTitulo'] = "Administrar";
	}

	public function index()
	{
		ifPermissions('menu_list');
  		$this->page_data['tablaTitulo'] = "Lista de Menus";
		$this->page_data['menus'] = $this->menu_model->getActive();
		$this->load->view('menu/menu_l', $this->page_data);
	}

	public function nuevo()
	{
		ifPermissions('menu_add');
		$this->page_data['accion'] = "Nuevo menu";
		$this->page_data['return_url'] = "menu";
		$this->page_data['postAction'] = "menu/nuevoAction";
		$data = array(
					'id' => "0",
					'txtName' => "",
					'txtIcon' => "",
					'txtTypeObject' => "",
					'txtObject' => "",
					'txtOrder' => "",
					'txtMenuPadreID' => "",
				);
		$this->load->view('menu/menu_f', $this->page_data + $data);
	}

	public function nuevoAction()
	{
		ifPermissions('menu_add');
		postAllowed();
		$color = $this->menu_model->create([
			'name' => $this->input->post('txtName'),
			'icon' => $this->input->post('txtIcon'),
			'type_object' => $this->input->post('txtTypeObject'),
			'object' => $this->input->post('txtObject'),
			'order' => $this->input->post('txtOrder'),
			'menu_padre_id' => $this->input->post('txtMenuPadreID'),
			'created_at' => date("Y-m-d H:i:s"),
			'estado' => '1'
		]);
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Nuevo registro creado');
		$this->activity_model->action_create("Menu");
		redirect('menu');
	}

	public function edit($id)
	{
		ifPermissions('menu_edit');
		$this->page_data['accion'] = "Editar menu";
		$this->page_data['return_url'] = "menu";
		$this->page_data['postAction'] = "menu/editAction";
		$registro = $this->menu_model->getById($id);
		$data = array(
					'id' => $registro->id,
					'txtName' => $registro->name,
					'txtIcon' => $registro->icon,
					'txtTypeObject' => $registro->type_object,
					'txtObject' => $registro->object,
					'txtOrder' => $registro->order,
					'txtMenuPadreID' => $registro->menu_padre_id,
				);
		$this->load->view('menu/menu_f', $this->page_data + $data);
	}

	public function editAction()
	{
		ifPermissions('menu_edit');
		postAllowed();
		$id = $this->input->post('id');
		$data = [
			'name' => $this->input->post('txtName'),
			'icon' => $this->input->post('txtIcon'),
			'type_object' => $this->input->post('txtTypeObject'),
			'object' => $this->input->post('txtObject'),
			'order' => $this->input->post('txtOrder'),
			'menu_padre_id' => $this->input->post('txtMenuPadreID'),
			'updated_at' => date("Y-m-d H:i:s"),
		];
		$registro = $this->menu_model->update($id, $data);
		$this->activity_model->action_edit("Menu", $id);
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Registro actualizado satisfactoriamente');		
		redirect('menu');
	}

	public function deleteAction($id)
	{
		ifPermissions('menu_delete');
		if($id!==1){ }else{
			redirect('/','refresh');
			return;
		}
		$id = $this->menu_model->delete_logic($id);
		$this->activity_model->action_delete("Menu", $id);
		$status = array(
						"STATUS"=>"true",
						"mensaje"=>"Registo eliminado satisfactoriamente",
						"redirect_url"=>site_url('menu')
						);
		echo json_encode($status);
	}

}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */