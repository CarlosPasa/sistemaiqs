<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Factura extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Models
		$this->load->model('factura_model');
		//Textos
		$this->page_data['page']->title = 'Facturas';
		$this->page_data['page']->menu = 'factura';
		$this->page_data['titulo'] = "Facturas";
  		$this->page_data['subTitulo'] = "Administrar";
	}

	public function index()
	{
		ifPermissions('factura_list');
  		$this->page_data['tablaTitulo'] = "Lista de Facturas";
		$this->page_data['facturas'] = $this->factura_model->getActive();
		$this->load->view('factura/factura_l', $this->page_data);
	}

	public function edit($id)
	{
		ifPermissions('factura_edit');
		$this->page_data['accion'] = "Editar factura";
		$this->page_data['return_url'] = "factura";
		$this->page_data['postAction'] = "factura/editAction";
		$registro = $this->factura_model->getById($id);
		$data = array(
					'id' => $registro->id,
					'txtSerie' => $registro->serie,
					'txtCorrelativo' => $registro->correlativo
		);
		$dataDetalle = $this->factura_model->getDetalle($id);
		$dataAdicional = array(
			'dataDetalle' => $dataDetalle
		);
		$this->load->view('factura/factura_f', $this->page_data + $data + $dataAdicional);
	}

	public function editAction()
	{
		$id = $this->input->post('id');
		$data = array(
					'serie' => $this->input->post('txtSerie'),
					'correlativo' => $this->input->post('txtCorrelativo'),
					'updated_at' => date("Y-m-d H:i:s"),
		);
		$registro = $this->factura_model->update($id, $data);
		$status = array(
						"STATUS"      =>"true",
						"mensaje"     =>"El registro se ha actualizado satisfactoriamente"
						);
		echo json_encode ($status);
	}

	public function deleteAction($id)
	{
		ifPermissions('factura_delete');
		$id = $this->factura_model->delete_logic($id);
		$this->activity_model->action_delete("Factura", $id);
		$status = array(
						"STATUS"=>"true",
						"mensaje"=>"Registo eliminado satisfactoriamente",
						"redirect_url"=>site_url('factura')
						);
		echo json_encode($status);
	}

	public function nuevoModal()
    {
		ifPermissions('factura_add');
		$this->page_data['return_url'] = "factura";
		$this->page_data['postAction'] = "factura/nuevoModalAction";
        $data = array(
            'id'			=> "0",
			'txtSerie'		=> "",
			'txtCorrelativo' => ""
        );
		$dataAdicional = array(
        );
		$this->load->view('factura/factura_f_modal', $this->page_data + $data + $dataAdicional);
    }
	
	public function nuevoModalAction()
    {
		$data = array(
					'serie' => $this->input->post('txtSerie'),
					'correlativo' => $this->input->post('txtCorrelativo'),
					'estado' => '1'
 		);
		$factura = $this->factura_model->create($data);
		$this->activity_model->action_create("Facturas");
		$status = array(
						"STATUS"      =>"true",
						"mensaje"     =>"",
						"redirect_url" => 'factura/edit/'.$factura
						);
		echo json_encode ($status);
	}

	public function ajax_listarDetalle($idFactura){
		$data = $this->factura_model->getDetalle($idFactura);;
		$dataAdicional = array(
			'data'		=> $data
		);
		echo json_encode($dataAdicional);
	}

}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */