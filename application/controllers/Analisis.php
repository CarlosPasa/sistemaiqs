<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analisis extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Models
		$this->load->model('analisis_model');
		//Textos
		$this->page_data['page']->title = 'Analisis';
		$this->page_data['page']->menu = 'analisis';
		$this->page_data['titulo'] = "Analisis";
  		$this->page_data['subTitulo'] = "Administrar";
	}

	public function index()
	{
		//ifPermissions('analisis_list');
  		$this->page_data['tablaTitulo'] = "Lista de Analisis";
		$this->page_data['analisis'] = $this->analisis_model->getActive();
		$this->load->view('analisis/analisis_l', $this->page_data);
	}

	public function editModal($id)
	{
		//ifPermissions('analisis_edit');
		$this->page_data['accion'] = "Editar analisis";
		$this->page_data['return_url'] = "analisis";
		$this->page_data['postAction'] = "analisis/editAction";
		$registro = $this->analisis_model->getById($id);
		$idMuestra = $this->input->get('idMuestra', TRUE);
        $data = array(
			'id'			=> $id,
			'txtNombreAnalisis'		=> $registro->nombre_analisis,
			'txtMa'		=> $registro->ma,
			'txtPr'		=> $registro->pr,
			'idMuestra'	=> $idMuestra
        );
		$dataAdicional = array(
        );
		$this->load->view('analisis/analisis_f_modal', $this->page_data + $data + $dataAdicional);
	}

	public function editAction()
	{
		$id = $this->input->post('id');
		$data = array(
					'nombre_analisis' => $this->input->post('txtNombreAnalisis'),
					'ma' => $this->input->post('txtMa'),
					'pr' => $this->input->post('txtPr'),
					'updated_at' => date("Y-m-d H:i:s"),
		);
		$registro = $this->analisis_model->update($id, $data);
		$status = array(
						"STATUS"      =>"true",
						"mensaje"     =>"El registro se ha actualizado satisfactoriamente"
						);
		echo json_encode ($status);
	}

	public function deleteAction($id)
	{
		//ifPermissions('analisis_delete');
		$idCadena=$id;
		$id = $this->analisis_model->delete($id);
		$this->activity_model->action_delete("Analisis", $id);
		$status = array(
						"STATUS"=>"true",
						"mensaje"=>"Registo eliminado satisfactoriamente",
						"redirect_url"=>site_url('cadena_custodia/edit/'.substr($idCadena,0,10))
						);
		echo json_encode($status);
	}

	public function nuevoModal()
    {
		//ifPermissions('analisis_add');
		$this->page_data['return_url'] = "analisis";
		$this->page_data['postAction'] = "analisis/nuevoModalAction";
		$idMuestra = $this->input->get('idMuestra', TRUE);
        $data = array(
            'id'			=> "0",
			'txtNombreAnalisis'		=> "",
			'txtMa'		=> "",
			'txtPr'		=> "",
			'idMuestra'	=> $idMuestra
        );
		$dataAdicional = array(
        );
		$this->load->view('analisis/analisis_f_modal', $this->page_data + $data + $dataAdicional);
    }
	
	public function nuevoModalAction()
    {
		$idMuestra=$this->input->post('idMuestra');
		$data = array(
			'id'			=> $this->generarCodigo($idMuestra),
			'nombre_analisis' => $this->input->post('txtNombreAnalisis'),
			'ma' => $this->input->post('txtMa'),
			'pr' => $this->input->post('txtPr'),
			'idMuestra' => $this->input->post('idMuestra'),
			'estado' => '1'
 		);	
		$config = array(
			array('field' => 'txtNombreAnalisis','label' => 'Nombre de analisis',	'rules' => 'required'),
            array('field' => 'txtMa','label' => 'Ma',	'rules' => 'required'),
			array('field' => 'txtPr','label' => 'Pr',	'rules' => 'required'),
		);
		$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE){
			$status = array(
				"STATUS"  =>"false",
				"mensaje" => validation_errors(),//muestra los mensaje de la validacion
				);
			echo json_encode ($status);
		}else{		
			$analisis = $this->analisis_model->create($data);
			$this->activity_model->action_create("Analisis");
			$status = array(
							"STATUS"      =>"true",
							"mensaje"     =>"Se registro correctamente el analisis requerido",
							//"redirect_url" => 'analisis/edit/'.$analisis
							);
			echo json_encode ($status);
		}	
	}
	public function generarCodigo($idMuestra){
		$total_registros = $this->analisis_model->getTotalNumberMuestraRecords($idMuestra);
		$correlativo = str_pad($total_registros+1, 2, "0", STR_PAD_LEFT);
		$codigo=$idMuestra."-".$correlativo;
		return ($codigo);
	}
	public function listarModal($id)
    {
		//ifPermissions('analisis_add');
		$this->page_data['return_url'] = "analisis";
		$this->page_data['postAction'] = "analisis/nuevoModalAction";
		$data = array(
			'id'	=> $id,
			'idMuestra'	=> $id,
        );
		$this->page_data['analisis'] = $this->analisis_model->getAnalisisByidMuestra($id);
		$this->load->view('analisis/analisis_l_modal', $this->page_data + $data);
    }
	public function deleteMuestraAction($id)
	{
		//ifPermissions('analisis_delete');
		$idCadena=$id;
		$id = $this->analisis_model->delete($id);
		$this->activity_model->action_delete("Analisis", $id);
		$status = array(
						"STATUS"=>"true",
						"mensaje"=>"Registo eliminado satisfactoriamente",
						"redirect_url"=>site_url('muestra/editMuestra/'.substr($idCadena,0,13))
						);
		echo json_encode($status);
	}
}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */