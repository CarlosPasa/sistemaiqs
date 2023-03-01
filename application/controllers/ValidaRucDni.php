<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class ValidaRucDni extends MY_Controller {

    public function __construct()
	{
		parent::__construct();
		//Models
		$this->load->library('form_validation');//cargo la libreria de validacion
    }

    public function getValidaRUCDNI(){
        $DniRuc = $this->input->post('Parametro');
        $TipoDoc = $this->input->post('TipoDoc');
        $CodUrl = $this->input->post('CodUrl');
		$url='';
        $token='944b3791d2f19c4f0fcbe8aa3110dbc74b694e14a6d4a38e75a9175c04f7ac33';
        $config;
        if($TipoDoc==1){//1-> DNI
            $config = array(
                array('field' => 'Parametro','label' => 'DNI',	'rules' => 'required|exact_length[8]'),
                array('field' => 'TipoDoc','label' => 'Tipo Documento',	'rules' => 'required'),
            );
            $url='https://apiperu.dev/api/dni/';
        }else if($TipoDoc==6){ //6->RUC
            $config = array(
                array('field' => 'Parametro','label' => 'RUC',	'rules' => 'required|exact_length[11]|numeric'),
                array('field' => 'TipoDoc','label' => 'Tipo Documento',	'rules' => 'required'),
            );
            $url='https://apiperu.dev/api/ruc/';
        }
        $this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE){
			$status = array(
                "STATUS"  =>"false",
                "mensaje" => validation_errors(),
                );
			echo json_encode ($status);
		}else{
			$curl = curl_init();// Inicia una nueva sesión cURL
            curl_setopt_array($curl, array( // Define opciones para nuestra sesion cURL
                //"https://apiperu.dev/api/ruc/"
                CURLOPT_URL => "$url".$DniRuc,//Define la URL de la petición HTTP (Solamente esta opción es obligatoria, el resto son totalmente opcionales)
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "", //Si el valor se envía vacío, "", se enviarán todos los tipos de codificación soportados.
                CURLOPT_MAXREDIRS => 10, //Número máximo de redirecciones HTTP a seguir. Use esta opción con CURLOPT_FOLLOWLOCATION.
                CURLOPT_TIMEOUT => 0, //Número máximo de segundos permitido para ejectuar funciones cURL.
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer ".$token
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            echo $response;
		}
    }

}