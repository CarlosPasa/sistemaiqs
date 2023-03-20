<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muestra extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Models
		$this->load->model('muestra_model');
		$this->load->model('analisis_model');
		//Textos
		$this->page_data['page']->title = 'Muestras';
		$this->page_data['page']->menu = 'muestra';
		$this->page_data['titulo'] = "Muestras";
  		$this->page_data['subTitulo'] = "Administrar";
		$this->load->library('form_validation');//cargo la libreria de validacion
	}

	public function index()
	{
		//ifPermissions('cliente_list');
  		$this->page_data['tablaTitulo'] = "Lista de muestras";
		$this->page_data['muestras'] = $this->muestra_model->getActive();
		$this->load->view('muestra/muestra_l', $this->page_data);
	}

	public function edit($id)
	{
		//ifPermissions('cliente_edit');
		$this->page_data['return_url'] = "muestra";
		$this->page_data['postAction'] = "muestra/editAction";
		$idCadena = $this->input->get('idCadena', TRUE);
		$registro = $this->muestra_model->getById($id);
		$hora= substr($registro->fecha_hora,10);
		$fecha= substr($registro->fecha_hora,0,10);
        $data = array(
            'id'			=> $registro->id,
			'txtCodigoCampo'	=> $registro->codigo_campo,
			'txtUbicacion'	=> $registro->ubicacion,
			'txtFechaMuestreo'	=> $fecha,
			'txtHora'	=> $hora,
			'txtCP'	=> $registro->contenedor_p,
			'txtCV'	=>$registro->contenedor_v,
			'txtCO'	=> $registro->contenedor_otros,
			'idCadena'	=> $idCadena
        );
		$dataAdicional = array(
        );
		$this->load->view('muestra/muestra_f_modal', $this->page_data + $data + $dataAdicional);
	}

	public function editAction()
	{
		$id = $this->input->post('id');
		$idCadena=$this->input->post('idCadena');
		$fecha=$this->format_date($this->input->post('txtFechaMuestreo'));
		$hora=$this->input->post('txtHora');
		$fechaHora=$fecha." ".$hora;
		$data = array(
					'codigo_campo'=>$this->input->post('txtCodigoCampo'),
					'ubicacion'=>$this->input->post('txtUbicacion'),
					'fecha_hora'=>$fechaHora,
					'contenedor_p'=>$this->input->post('txtCP'),
					'contenedor_v'=>$this->input->post('txtCV'),
					'contenedor_otros'=>$this->input->post('txtCO'),
					'updated_at' => date("Y-m-d H:i:s"),
 		);
		$registro = $this->muestra_model->update($id, $data);
		$status = array(
						"STATUS"      =>"true",
						"mensaje"     =>"El registro se ha actualizado satisfactoriamente"
						);
		echo json_encode ($status);
	}

	public function deleteAction($id)
	{
		//ifPermissions('muestra_delete');
		$idCadena=$id;
		$id = $this->muestra_model->delete($id);
		$this->activity_model->action_delete("muestra", $id);
		$status = array(
						"STATUS"=>"true",
						"mensaje"=>"Registo eliminado satisfactoriamente",
						"redirect_url"=>site_url('cadena_custodia/edit/'.substr($idCadena,0,10))
						);
		echo json_encode($status);
	}

	public function nuevoModal()
    {
		//ifPermissions('muestra_add');
		$this->page_data['return_url'] = "muestra";
		$this->page_data['postAction'] = "muestra/nuevoModalAction";
		$idCadena = $this->input->get('idCadena', TRUE);
        $data = array(
            'id'			=> "0",
			'txtCodigoCampo'	=> "",
			'txtUbicacion'	=> "",
			'txtFechaMuestreo'	=> date("Y-m-d H:i:s"),
			'txtHora'	=> "",
			'txtCP'	=> "",
			'txtCV'	=> "",
			'txtCO'	=> "",
			'idCadena'	=> $idCadena
        );
		$dataAdicional = array(
        );
		$this->load->view('muestra/muestra_f_modal', $this->page_data + $data + $dataAdicional);
    }
	
	public function nuevoModalAction()
    {
		$idCadena=$this->input->post('idCadena');
		$fecha=$this->format_date($this->input->post('txtFechaMuestreo'));
		$hora=$this->input->post('txtHora');
		$fechaHora=$fecha." ".$hora;
		$data = array(
					'id'			=> $this->generarCodigo($idCadena),
					'idCadenaCustodia'=>$idCadena,
					'codigo_campo'=>$this->input->post('txtCodigoCampo'),
					'ubicacion'=>$this->input->post('txtUbicacion'),
					'fecha_hora'=>$fechaHora,
					'contenedor_p'=>$this->input->post('txtCP'),
					'contenedor_v'=>$this->input->post('txtCV'),
					'contenedor_otros'=>$this->input->post('txtCO'),
					'estado' => '1'
 		);
		$config = array(
			array('field' => 'txtCodigoCampo','label' => 'Codigo Campo',	'rules' => 'required'),
            array('field' => 'txtUbicacion','label' => 'Ubicación',	'rules' => 'required'),
			array('field' => 'txtFechaMuestreo','label' => 'Fecha de muestreo',	'rules' => 'required'),
			array('field' => 'txtCP','label' => 'Contenedores P',	'rules' => 'required'),
            array('field' => 'txtCV','label' => 'Contenedores V',	'rules' => 'required'),
			array('field' => 'txtCO','label' => 'Contenedores Otros',	'rules' => 'required'),
		);
		$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE){
			$status = array(
				"STATUS"  =>"false",
				"mensaje" => validation_errors(),//muestra los mensaje de la validacion
				);
			echo json_encode ($status);
		}else{
			$muestra = $this->muestra_model->create($data);
			$this->activity_model->action_create("Muestra");
			$status = array(
							"STATUS"      =>"true",
							"mensaje"     =>"Se registro correctamente la muestra",						
							);
			echo json_encode ($status);
		}
	}

	public function generarCodigo($idCadena){
		$total_registros = $this->muestra_model->getTotalNumberMuestraRecords($idCadena);
		$correlativo = str_pad($total_registros+1, 2, "0", STR_PAD_LEFT);
		$codigo=$idCadena."-".$correlativo;
		return ($codigo);
	}
	public function listar_muestras($idCadena){
		$data = $this->muestra_model->getMuestrasByIdCadena($idCadena);
		echo json_encode($data);
	}
	public function editMuestra($id)
	{
		//ifPermissions('cliente_edit');
		$this->page_data['return_url'] = "muestra";
		$this->page_data['postAction'] = "muestra/editMuestraAction";
		$this->page_data['accion'] = "Editar muestra ".$id;
		$idCadena = $this->input->get('idCadena', TRUE);
		$registro = $this->muestra_model->getById($id);
		$hora= substr($registro->fecha_hora,10);
		$fecha= substr($registro->fecha_hora,0,10);
        $data = array(
            'id'			=> $registro->id,
			'txtCodigoCampo'	=> $registro->codigo_campo,
			'txtUbicacion'	=> $registro->ubicacion,
			'txtFechaMuestreo'	=> $fecha,
			'txtHora'	=> $hora,
			'txtCP'	=> $registro->contenedor_p,
			'txtCV'	=>$registro->contenedor_v,
			'txtCO'	=> $registro->contenedor_otros,
			'idCadena'	=> $idCadena
        );
		$dataAdicional = array(
			'dataDetalle' => $this->analisis_model->getAnalisisByidMuestra($id),
        );
		$this->load->view('muestra/muestra_f_edit', $this->page_data + $data + $dataAdicional);
	}
	public function editMuestraAction()
	{
		$id = $this->input->post('id');
		$idCadena=$this->input->post('idCadena');
		$fecha=$this->format_date($this->input->post('txtFechaMuestreo'));
		$hora=$this->input->post('txtHora');
		$fechaHora=$fecha." ".$hora;
		$data = array(
					'codigo_campo'=>$this->input->post('txtCodigoCampo'),
					'ubicacion'=>$this->input->post('txtUbicacion'),
					'fecha_hora'=>$fechaHora,
					'contenedor_p'=>$this->input->post('txtCP'),
					'contenedor_v'=>$this->input->post('txtCV'),
					'contenedor_otros'=>$this->input->post('txtCO'),
					'updated_at' => date("Y-m-d H:i:s"),
 		);
		$registro = $this->muestra_model->update($id, $data);
		$status = array(
						"STATUS"      =>"true",
						"mensaje"     =>"El registro se ha actualizado satisfactoriamente",
						"redirect_url" => site_url('muestra')
						);
		echo json_encode ($status);
	}
}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */