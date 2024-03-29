<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadena_custodia extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Models
		$this->load->model('cadena_model');
		$this->load->model('cliente_model');
		$this->load->model('empleado_model');
		$this->load->model('proyecto_model');
		$this->load->model('muestra_model');
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
		$this->page_data['cadena'] = $this->cadena_model->getAllCabecera();
		$this->load->view('cadena_custodia/cadena_custodia_l', $this->page_data);
	}

	public function nuevo()
	{
		ifPermissions('cadena_custodia_add');
		$this->page_data['accion'] = "Cadena de custodia ".date("Y").date("m");
		$this->page_data['return_url'] = "cadena_custodia";
		$this->page_data['postAction'] = "cadena_custodia/nuevoAction";
		$data = array(
					'id' => "0",
					'cbCliente' => "",
					'cbContacto' => "",
					'cbProyecto' => "",
					'txtDireccion'=>"",
					'txtDistrito'=>"",
					'txtProvincia'=>"Talara",
					'txtDepartamento'=>"Piura",
					'txtEmail'=>"",
					'txtTelefono'=>"",
					'txtCelular'=>"",
					'txtFecha'=>date("Y-m-d H:i:s"),
					'chkCliente'=>"",
					'chkIQS'=>"",
					'cbEmpleado'=>"",
					'txtAntecedentes'=>"",
					'empleados'=>array(),
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
		$id_empleados="";		
		if(isset($_POST["empleado"])){
			$empleados=$_POST["empleado"];
			for ($i=0;$i<count($empleados);$i++)    
			{
				if($i==0){$id_empleados="".$empleados[$i];}
				else{$id_empleados=$id_empleados.",".$empleados[$i];}
			}
		}
		$cadena_custodia = $this->cadena_model->create([
			'id'=>$this->generarCodigo(),
			'direccion'=>$this->input->post('txtDireccion'),
			'distrito'=>$this->input->post('txtDistrito'),
			'provincia'=>$this->input->post('txtProvincia'),
			'departamento'=>$this->input->post('txtDepartamento'),
			'fecha'=>$this->format_date($this->input->post('txtFecha')),
			'id_cliente' => $this->input->post('cbCliente'),
			'id_contacto' => $this->input->post('cbContacto'),
			'id_proyecto' => $this->input->post('cbProyecto'),
			'id_empleado' => $id_empleados,
			'telefono' => $this->input->post('txtTelefono'),
			'celular' => $this->input->post('txtCelular'),
			'email' => $this->input->post('txtEmail'),
			'opcion' => $this->input->post('chkCliente'),
			'created_at' => date("Y-m-d H:i:s"),
			'estado' => '1'
		]);
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Nuevo registro creado');
		$this->activity_model->action_create("Cadena de Custodia");
		redirect('cadena_custodia');
	}

	public function edit($id)
	{
		ifPermissions('cadena_custodia_edit');
		$this->page_data['accion'] = "Editar cadena_custodia ".$id;
		$this->page_data['return_url'] = "cadena_custodia";
		$this->page_data['postAction'] = "cadena_custodia/editAction";
		$registro = $this->cadena_model->getById($id);
		$persona_transportado = $registro->id_persona_transporte ? $this->empleado_model->getById($registro->id_persona_transporte) : (object)['nombre_empleado'=>''];
		$persona_entrega = $registro->id_persona_entrega ? $this->empleado_model->getById($registro->id_persona_entrega) : (object)['nombre_empleado'=>''];
		$persona_ingreso = $registro->id_persona_ingreso ? $this->empleado_model->getById($registro->id_persona_ingreso): (object)['nombre_empleado'=>''];
		$laboratorista = $registro->id_laboratorista ? $this->empleado_model->getById($registro->id_laboratorista) : (object)['nombre_empleado'=>''];
		$data = array(
					'id' => $registro->id,
					'cbCliente' => $registro->id_cliente,
					'cbContacto' => $registro->id_contacto,
					'txtDistrito' => $registro->distrito,
					'txtDireccion'=>$registro->direccion,
					'cbProyecto'=>"",
					'txtProvincia'=>$registro->provincia,
					'txtDepartamento'=>$registro->departamento,
					'txtEmail'=>$registro->email,
					'txtTelefono'=>$registro->telefono,
					'txtCelular'=>$registro->celular,
					'txtFecha'=>$registro->fecha,
					'chkCliente'=>"",
					'chkIQS'=>"",
					'cbEmpleado'=>"",
					'txtAntecedentes'=>"",
					'cliente_data' => $this->cliente_model->getActive(),
					'empleado_data' => $this->empleado_model->getActive(),
					'proyecto_data' => $this->proyecto_model->getActive(),
					'empleados'=>explode(",",$registro->id_empleado),
					'option' => $registro->opcion,
					'persona_transportado' => $persona_transportado->nombre_empleado,
					'fecha_transporte'=> '',
					'hora_transporte'=> '',
					'persona_entrega' => $persona_entrega->nombre_empleado,
					'fecha_entrega'=> '',
					'hora_entrega'=> '',
					'persona_ingreso' => $persona_ingreso->nombre_empleado,
					'fecha_ingreso'=> '',
					'hora_ingreso'=> '',
					'laboratorista' => $laboratorista->nombre_empleado,
					'fecha_laboratorio'=> '',
					'hora_laboratorio'=> '',
					'textAreaM'=> $registro->obs_muestra,
					'textAreaL'=> $registro->obs_laboratorio,
					'dataDetalle' => $this->muestra_model->getMuestrasByIdCadena($id),
				);
		if($registro->fecha_transporte) $data['fecha_transporte'] = date('d/m/Y',strtotime($registro->fecha_transporte)); $data['hora_transporte'] = substr($registro->fecha_transporte,10);
		if($registro->fecha_entrega) $data['fecha_entrega'] = date('d/m/Y',strtotime($registro->fecha_entrega));$data['hora_entrega'] = substr($registro->fecha_entrega,10);
		if($registro->fecha_ingreso) $data['fecha_ingreso'] = date('d/m/Y',strtotime($registro->fecha_ingreso));$data['hora_ingreso'] = substr($registro->fecha_ingreso,10);
		if($registro->fecha_laboratorio) $data['fecha_laboratorio'] = date('d/m/Y',strtotime($registro->fecha_laboratorio));$data['hora_laboratorio'] = substr($registro->fecha_laboratorio,10);
		//$this->load->view('cadena_custodia/cadena_custodia_f_edit', $this->page_data + $data);
		$this->load->view('cadena_custodia/cadena_custodia_f_edit2', $this->page_data + $data);
	}

	public function editAction()
	{
		ifPermissions('cadena_custodia_edit');
		postAllowed();
		$id = $this->input->post('id');
		$id_empleados="";		
		if(isset($_POST["empleado"])){
			$empleados=$_POST["empleado"];
			for ($i=0;$i<count($empleados);$i++)    
			{
				if($i==0){$id_empleados="".$empleados[$i];}
				else{$id_empleados=$id_empleados.",".$empleados[$i];}
			}
		}
		$data = [
			'id_cliente' => $this->input->post('cbCliente'),
			'direccion'=>$this->input->post('txtDireccion'),
			'distrito'=>$this->input->post('txtDistrito'),
			'provincia'=>$this->input->post('txtProvincia'),
			'departamento'=>$this->input->post('txtDepartamento'),
			'fecha'=>$this->format_date($this->input->post('txtFecha')),
			'id_contacto' => $this->input->post('cbContacto'),
			'id_proyecto' => $this->input->post('cbProyecto'),
			'id_empleado' => $id_empleados,
			'telefono' => $this->input->post('txtTelefono'),
			'celular' => $this->input->post('txtCelular'),
			'email' => $this->input->post('txtEmail'),
			'opcion' => $this->input->post('chkCliente'),
			'obs_muestra' => $this->input->post('textAreaM'),
			'obs_laboratorio' => $this->input->post('textAreaL'),
			'updated_at' => date("Y-m-d H:i:s"),
		];
		$registro = $this->cadena_model->update($id, $data);
		$status = array(
			"STATUS"      =>"true",
			"mensaje"     =>"El registro se ha actualizado satisfactoriamente",
			"redirect_url" => site_url('cadena_custodia')
		);
		$this->activity_model->action_edit("Cadena_custodia", $id);
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Registro actualizado satisfactoriamente');
		echo json_encode ($status);
	}

	public function deleteAction($id)
	{
		ifPermissions('cadena_custodia_delete');
		$id = $this->cadena_model->delete($id);
		$this->activity_model->action_delete("Cadena", $id);
		$status = array(
						"STATUS"=>"true",
						"mensaje"=>"Registo eliminado satisfactoriamente",
						"redirect_url"=>site_url('cadena_custodia')
						);
		echo json_encode($status);
	}

	public function generarCodigo(){
		$period=date("Y").date("m");
		$total_registros = $this->cadena_model->getTotalNumberCadenaRecords($period);
		$correlativo = str_pad($total_registros+1, 4, "0", STR_PAD_LEFT);
		$codigo=$period.$correlativo;
		return ($codigo);
	}
	public function listar_muestras($idCadena){
		$data = $this->muestra_model->getMuestrasByIdCadena($idCadena);
		$dataAdicional = array(
			'data'		=> $data
		);
		echo json_encode($dataAdicional);
	}
	public function view($id)
	{
		ifPermissions('cadena_custodia_edit');
		$this->page_data['accion'] = "Editar cadena_custodia ".$id;
		$this->page_data['return_url'] = "cadena_custodia";
		$this->page_data['postAction'] = "cadena_custodia/editAction";
		$registro = $this->cadena_model->getById($id);
		$persona_transportado = $registro->id_persona_transporte ? $this->empleado_model->getById($registro->id_persona_transporte) : (object)['nombre_empleado'=>''];
		$persona_entrega = $registro->id_persona_entrega ? $this->empleado_model->getById($registro->id_persona_entrega) : (object)['nombre_empleado'=>''];
		$persona_ingreso = $registro->id_persona_ingreso ? $this->empleado_model->getById($registro->id_persona_ingreso): (object)['nombre_empleado'=>''];
		$laboratorista = $registro->id_laboratorista ? $this->empleado_model->getById($registro->id_laboratorista) : (object)['nombre_empleado'=>''];
		$data = array(
					'id' => $registro->id,
					'cbCliente' => $registro->id_cliente,
					'cbContacto' => $registro->id_contacto,
					'txtDistrito' => $registro->distrito,
					'txtDireccion'=>$registro->direccion,
					'cbProyecto'=>"",
					'txtProvincia'=>$registro->provincia,
					'txtDepartamento'=>$registro->departamento,
					'txtEmail'=>$registro->email,
					'txtTelefono'=>$registro->telefono,
					'txtCelular'=>$registro->celular,
					'txtFecha'=>$registro->fecha,
					'chkCliente'=>"",
					'chkIQS'=>"",
					'cbEmpleado'=>"",
					'txtAntecedentes'=>"",
					'cliente_data' => $this->cliente_model->getActive(),
					'empleado_data' => $this->empleado_model->getActive(),
					'proyecto_data' => $this->proyecto_model->getActive(),
					'empleados'=>explode(",",$registro->id_empleado),
					'option' => $registro->opcion,
					'persona_transportado' => $persona_transportado->nombre_empleado,
					'fecha_transporte'=> '',
					'hora_transporte'=> '',
					'persona_entrega' => $persona_entrega->nombre_empleado,
					'fecha_entrega'=> '',
					'hora_entrega'=> '',
					'persona_ingreso' => $persona_ingreso->nombre_empleado,
					'fecha_ingreso'=> '',
					'hora_ingreso'=> '',
					'laboratorista' => $laboratorista->nombre_empleado,
					'fecha_laboratorio'=> '',
					'hora_laboratorio'=> '',
					'dataDetalle' => $this->muestra_model->getMuestrasByIdCadena($id),
				);
		if($registro->fecha_transporte) $data['fecha_transporte'] = date('d/m/Y',strtotime($registro->fecha_transporte)); $data['hora_transporte'] = substr($registro->fecha_transporte,10);
		if($registro->fecha_entrega) $data['fecha_entrega'] = date('d/m/Y',strtotime($registro->fecha_entrega));$data['hora_entrega'] = substr($registro->fecha_entrega,10);
		if($registro->fecha_ingreso) $data['fecha_ingreso'] = date('d/m/Y',strtotime($registro->fecha_ingreso));$data['hora_ingreso'] = substr($registro->fecha_ingreso,10);
		if($registro->fecha_laboratorio) $data['fecha_laboratorio'] = date('d/m/Y',strtotime($registro->fecha_laboratorio));$data['hora_laboratorio'] = substr($registro->fecha_laboratorio,10);
		$this->load->view('cadena_custodia/cadena_custodia_f_view', $this->page_data + $data);
	}
}

/* End of file Cadena_custodia.php */
/* Location: ./application/controllers/cadena_custodia.php */