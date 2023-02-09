<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Factura_detalle extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Models
		$this->load->model('factura_model');
		$this->load->model('factura_detalle_model');
		$this->load->model('producto_model');
		//Textos
		$this->page_data['page']->title = 'Detalle';
		$this->page_data['page']->menu = 'factura_detalle';
		$this->page_data['titulo'] = "Detalle";
  		$this->page_data['subTitulo'] = "Administrar";
	}

	public function index($idFactura)
	{
		ifPermissions('factura_detalle_list');
  		$this->page_data['tablaTitulo'] = "Detalle";
		$this->page_data['detalle'] = $this->factura_model->getDetalle($idFactura);
		$this->page_data['idFactura'] = $idFactura;
		$this->load->view('factura_detalle/factura_detalle_l', $this->page_data);
	}

	public function edit($id)
	{
		ifPermissions('factura_detalle_edit');
		$this->page_data['accion'] = "Editar detalle";
		$registro = $this->factura_detalle_model->getById($id);
		$this->page_data['return_url'] = "factura_detalle/index/".$registro->id_factura;
		$this->page_data['postAction'] = "factura_detalle/editAction";
		$data = array(
					'id' => $registro->id,
					'id_factura' => $registro->id_factura,
					'txtCantidad' => $registro->cantidad,
					'id_producto' => $registro->id_producto,
					'txtPrecio' => $registro->precio
				);
		$dataAdicional = array(
			'productos_data' => $this->producto_model->getActive()
        );
		$this->load->view('factura_detalle/factura_detalle_f_modal', $this->page_data + $data + $dataAdicional);
	}

	public function editAction()
	{
		$id = $this->input->post('id');
		$data = array(
			'cantidad' => $this->input->post('txtCantidad'),
			'id_producto' => $this->input->post('id_producto'),
			'precio' => $this->input->post('txtPrecio'),
			'id_factura' => $this->input->post('id_factura'),
			'updated_at' => date("Y-m-d H:i:s")
 		);
		$registro = $this->factura_detalle_model->update($id, $data);
		$status = array(
						"STATUS"      =>"true",
						"mensaje"     =>""
						);
		echo json_encode ($status);
	}

	public function deleteAction($id)
	{
		ifPermissions('factura_detalle_delete');
		$id = $this->factura_detalle_model->delete_logic($id);
		$this->activity_model->action_delete("Factura Detalle", $id);
		$status = array(
						"STATUS"=>"true",
						"jsFunction"=>"onDetalle_reload()"
						);
		echo json_encode($status);
	}
	
	public function nuevoModal()
	{
		ifPermissions('factura_detalle_add');
		$idFactura = $this->input->get('idFactura', TRUE);
		$this->page_data['accion'] = "Nuevo Detalle";
		$this->page_data['return_url'] = "factura_detalle/index/".$idFactura;
		$this->page_data['postAction'] = "factura_detalle/nuevoModalAction";
		$data = array(
					'id' => "0",
					'id_factura' => $idFactura,
					'txtCantidad' => "",
					'id_producto' => "",
					'txtPrecio' => ""
				);
		$dataAdicional = array(
			'productos_data' => $this->producto_model->getActive()
        );
		$this->load->view('factura_detalle/factura_detalle_f_modal', $this->page_data + $data + $dataAdicional);
	}
	
	public function nuevoModalAction()
    {
		$data = array(
			'cantidad' => $this->input->post('txtCantidad'),
			'id_producto' => $this->input->post('id_producto'),
			'precio' => $this->input->post('txtPrecio'),
			'id_factura' => $this->input->post('id_factura'),
			'created_at' => date("Y-m-d H:i:s"),
			'estado' => '1'
 		);
		$detalle = $this->factura_detalle_model->create($data);
		$status = array(
						"STATUS"      =>"true",
						"mensaje"     =>""
						);
		echo json_encode ($status);
	}

}

/* End of file Factura_Detalle.php */
/* Location: ./application/controllers/Factura_Detalle.php */