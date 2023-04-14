<?php

if(! defined('BASEPATH')) exit('No tiene acceso a escritura directa.');



if(!function_exists('vFormAtributos')){

	function vFormAtributos($id=null){

		if ($id == null) $id = "frmFicha";

		return array(

					'id' => $id,

					'class'=> 'form-horizontal .col-xs-12 .col-sm-6 .col-md-8',

					'method' =>'POST',

					'role' => 'form',

					'autocomplete' => 'off'

					);

	}

}



if(!function_exists('vLabel')){

	function vLabel($for, $campoValor, $class=null, $id=null){

		echo "<label ";

		if ($id != null) echo " id='" . $id . "' ";

		echo "class=\"control-label ";

		if ($class != null) echo $class;

		echo "\" ";

		echo "for=\"" . $for . "\" ";

		echo "style='text-align: left;' ";

		echo ">";

		echo str_replace("/ñ/","n",$campoValor);

		echo "</label>\n";

	}

}



if(!function_exists('vRestriccion')){

	function vRestriccion(){

		echo "<span class=\"label label-info\">* Dicho archivo debe ser formato PDF.</span><br />";

		echo "<span class=\"label label-info\">* Dicho archivo no debe exceder los 100 Kb.</span>";

	}

}



if(!function_exists('vArchivoPDF')){

	function vArchivoPDF($campoValor){

		if($campoValor){

			list($id,$nombre,$url)= explode ("*", $campoValor);

			list($tmp,$url)= explode ("elp/", $url);

			vLink("linkArchivo",NULL,"#","fa fa-file-pdf-o","btn btn-default btn-circle btn-lg ",$nombre,"ShowDialogInformationView('".$nombre."','".site_url($url)."')");	

		}

	}

}



if(!function_exists('vTextBox')){

	function vTextBox($id, $campoValor,$placeholder=null,$icon=null,$mask=null,$js=NULL, $dis=NULL, $iconRight=false, $required=null, $disabled=false,$maxlength=null){

		if($icon != ''){

			echo "<div class='input-group'>";

			if (!$iconRight) echo "<span class='input-group-addon'><i class='" . $icon ."'></i></span>\n";

		}

		echo "<input id='" . $id . "' name='" . $id . "' type='text' ";

		echo " placeholder='" . $placeholder . "'";

		echo " class='form-control input-md '";

		echo $dis;

		echo " value='" . $campoValor . "'";

		if ($required != null) echo " required ";

		if($mask != ''){

			echo " data-inputmask=\"'mask': '" . $mask . "'\" data-mask";

		}
		
		if ($disabled){
			echo " disabled ";
		}

		if($maxlength != null){
			echo " maxlength='" . $maxlength . "'";
		}		

		echo " ".$js."/>\n";

		if($icon != ''){

			if ($iconRight) echo "<span class='input-group-addon'><i class='" . $icon ."'></i></span>\n";

			echo "</div>";

		}

	}

}



if(!function_exists('vTextBoxPass')){

	function vTextBoxPass($id, $campoValor,$placeholder=null,$icon=null,$mask=null,$js=NULL, $dis=NULL){

		if($icon != ''){

			echo "<div class='input-group'>";

			echo "<span class='input-group-addon'><i class='" . $icon ."'></i></span>\n";

		}

		echo "<input id='" . $id . "' name='" . $id . "' type='password' ";

		echo " placeholder='" . $placeholder . "'";

		echo " class='form-control input-md '";

		echo $dis;

		echo " value='" . $campoValor . "'";

		if($mask != ''){

			echo " data-inputmask=\"'mask': '" . $mask . "'\" data-mask";

		}

		echo " ".$js."/>\n";

		if($icon != ''){

			echo "</div>";

		}

	}

}



if(!function_exists('vComboBox')){

	function vComboBox($id, $arrayData, $campoCodigo, $campoValor,$js=NULL,$selec=NULL, $disabledDefaultValue = true){

		echo "<select id='" . $id . "' name='" . $id . "' class='form-control input-md' ".$js." > \n";

		echo "<option value='0' ";
		if ($disabledDefaultValue) echo "disabled";
		echo ">Seleccione Opción</option>\n";

		if(isset($arrayData)){

			foreach($arrayData as $row){

				echo "<option value='" . $row[$campoCodigo] . "' ";

				echo ($row[$campoCodigo] == $selec) ? ("selected=\"selected\"") : ("");

				echo " >" . $row[$campoValor] . "</option>\n";

			}

		}

		echo "</select>\n";

	}

}



if(!function_exists('vDateTimePicker')){

	function vDateTimePicker($id, $campoValor, $placeholder=null, $dis=NULL, $rightIcon=false, $isCustom=false){

	echo "<div class='input-group " . ($isCustom == false ? "date" : "custom") . "' ".$dis." >";

		if ($rightIcon == false){

			echo "<span class='input-group-addon' ".$dis." >";

			echo "<i class='glyphicon glyphicon-calendar' ".$dis." ></i>";

			echo "</span>\n";

		}

		echo "<input id='" . $id . "' name='" . $id . "' type='text' class='form-control' ";

		echo " value='" . $campoValor . "' ";

		echo $dis;

		echo " placeholder='" . $placeholder . "'";

		echo " data-inputmask=\"'alias': 'dd/mm/yyyy'\"  data-mask";

		echo " />\n";

		if ($rightIcon == true){

			echo "<span class='input-group-addon' ".$dis." >";

			echo "<i class='glyphicon glyphicon-calendar' ".$dis." ></i>";

			echo "</span>\n";

		}

		echo "</div>";

	}

}



if(!function_exists('vHidden')){

	function vHidden($id, $campoValor){

		echo "<input id='" . $id . "' name='" . $id . "' type='hidden' ";

		echo " value='" . $campoValor . "' />\n";

	}

}



if(!function_exists('vTotal')){

	function vTotal($total){

		echo "<a href=\"#\" class=\"btn btn-primary\">";

		echo "Total Registro : ";

		echo "<span class=\"badge\">";

		echo $total;

		echo "</span></a>\n";

		

	}

}



if(!function_exists('Paginar')){

	function Paginar($b, $per_page, $form, $total, $pag, $dat, $titulo=NULL, $rep_data=NULL,$dataAdicional=NULL){

		$ci =& get_instance();

		if($b <> ''){

			$config['base_url'] = site_url().$form.'?b='. urlencode($b);

			$config['first_url'] = site_url().$form.'?b='. urlencode($b);

		}

		else{

			$config['base_url'] = site_url() . '\\' . $form;

			$config['first_url'] = site_url() . '\\' . $form;

		}



		$config['total_rows'] = $total;

		$config['per_page'] = $pag;

		$config['page_query_string'] = TRUE;

		

		$ci->load->library('pagination');

		$ci->pagination->initialize($config);

		$dataPag         = array(

			'dataF'=> $dat,

			'b'           => $b,

			'titulo'	=> $titulo,

			'pagination'  => $ci->pagination->create_links(),

			'total_data'  => $config['total_rows'],

			'per_page'    => $per_page,

			'rep_data'	=> $rep_data,

		);

		if ($dataAdicional == NULL) $dataAdicional = array();

		return $dataPag + $dataAdicional;

	}

}



if(!function_exists('PaginarDate')){

	function PaginarDate($fecha1, $fecha2, $per_page, $form, $total, $pag, $dat, $titulo=NULL){

		$ci =& get_instance();

		if($fecha1 <> ''){

			$config['base_url'] = base_url().$form.'?busFechaInicio='. urlencode($fecha1) . '&busFechaFin='.urlencode($fecha2);

			$config['first_url'] = base_url().$form.'?busFechaInicio='. urlencode($fecha1) . '&busFechaFin='.urlencode($fecha2);

		}

		else{

			$config['base_url'] = base_url() . $form;

			$config['first_url'] = base_url() . $form;

		}

		

		$config['total_rows'] = $total;

		$config['per_page'] = $pag;

		$config['page_query_string'] = TRUE;

		

		$ci->load->library('pagination');

		$ci->pagination->initialize($config);

		$dataPag         = array(

			'dataF'=> $dat,

			'busFechaInicio'	=> $fecha1,

			'busFechaFin'	=> $fecha2,

			'titulo'		=> $titulo,

			'pagination'  => $ci->pagination->create_links(),

			'total_data'  => $config['total_rows'],

			'per_page'    => $per_page,

		);

		return $dataPag;

	}

}



if(!function_exists('vLink')){

	function vLink($id, $texto=NULL, $url, $icon=null, $class=null, $title=NULL, $onClickEvent=NULL){

		echo "<a ";

		echo "id='" . $id . "' ";

		echo "href='" . $url . "' ";

		echo "data-toggle='modal' data-target='#myModal' ";

		if($class != ''){

			echo " class='" . $class . "' ";

		}

		if($title != ''){

			echo " title='" . $title . "' ";

		}

		if($onClickEvent != ''){

			echo "onclick=\"javascript:" . $onClickEvent . ";\"";

		}

		echo ">";

		if($icon != ''){

			echo "<i class='". $icon . "'></i>";

		}

		echo $texto;

		echo "</a>\n";

	}

}



if(!function_exists('vButton')){

	function vButton($id, $texto, $url, $icon=null, $class=null){

		echo "<a href='" . $url . "' ";

		if($class != ''){

			echo "class='" . $class . "'";

		}

		echo ">";

		if($icon != ''){

			echo "<i class='". $icon . "'></i>";

		}

		echo " ".$texto;

		echo "</a>\n";

	}

}







if(!function_exists('vButtonImprimir')){

	function vButtonImprimir($title, $texto, $titulo, $url, $class=null){

		if ($class == null) $class = "btn btn-default";

		echo "<button ";

		echo "class='" . $class . "' ";

		echo "title=\"".$title."\" type=\"button\"";

		echo "onclick=\"javascript:ShowDialogInformationView('".$titulo."','".site_url($url)."')\"> ";

		echo "<i class=\"fa fa-print\"></i> ".$texto."</button>";

	}

}



if(!function_exists('vButtonDefault')){

	function vButtonDefault($id, $texto, $url, $icon=null, $class=null, $onClickEvent=null, $tooltip=null, $spinner=true){

		echo "<button id='" . $id . "' "; 

		echo "type='button' class='" . $class . "' ";

		if($onClickEvent != ''){

			echo "onclick=\"javascript:" . $onClickEvent . ";\"";

		}

		if ($tooltip != null) echo " title='" . $tooltip . "' ";

		echo ">";

		if($icon != ''){

			echo "<i class='" . $icon . "'></i>";

		}

		echo " " . $texto . " ";

		if ($spinner == true)

			echo "<span class='spinner'><i class='fa fa-refresh fa-spin'></i></span>";

		echo "</button>\n";

	}

}



if(!function_exists('vButtonSubmit')){

	function vButtonSubmit($id, $texto){

		echo "<button type='button' class='btn btn-success has-spinner' onclick='javascript:ajaxFormularioEnviar(this);'>";

		echo "<i class='fa fa-save'></i>";

		echo " " . $texto . " ";

		echo "<span class='spinner'><i class='fa fa-refresh fa-spin'></i></span>";

		echo "</button>\n";

	}

}



if(!function_exists('vButtonS')){

	function vButtonS($id, $texto, $icon=null, $class=null){

		echo "<button id='bsubmit' type='submit' ";

		if ($class == null) $class = "btn btn-success";

		echo "class='" . $class ." has-spinner'";

		echo ">";

		if ($icon == null)

			echo "<i class='fa fa-save'></i> ";

		else

			echo "<i class='" . $icon . "'></i> ";

		echo $texto;

		echo " <span class='spinner'><i class='fa fa-refresh fa-spin'></i></span>";

		echo "</button>\n";

	}

}



if(!function_exists('vButtonCancel')){

	function vButtonCancel($id, $texto, $url){

		echo "<a href='" . $url . "' class='btn btn-primary'>";

		echo "<i class='glyphicon glyphicon-arrow-left'></i> " . $texto . "";

		echo "</a>\n";

	}

}



class menuItem{

	public $url;

	public $titulo;

	public $javascript;

	function __construct(array $prop=array()){

		foreach($prop as $key => $value){

			$this->{$key} = $value;

		}

	}

}

if(!function_exists('vButtonDropDown')){

	function vButtonDropDown($id, $texto, $icon=null, $class=null, $menuItems){

		echo "<div class='dropdown'>\n";

		echo "<button class='" . $class . " dropdown-toggle' type='button' data-toggle='dropdown'>";

		if($icon != ''){

			echo "<i class='". $icon . "'></i>";

		}

		echo " " . $texto . " ";

		echo "<span class='caret'></span>";

		echo "</button>\n";

		echo "<ul class='dropdown-menu'>";

		foreach($menuItems as $itemAccion){

			echo "<li>";

			//if ($itemAccion->javascript != null) $itemAccion->url = "#";

			echo "<a href='" . $itemAccion->url . "' ";

			if ($itemAccion->javascript !=null) echo "onclick='" . $itemAccion->javascript . ";return false;' ";

			echo ">";

			echo $itemAccion->titulo;

			echo "</a>";

			echo "</li>";	

		}

		echo "</ul>\n";

		echo "</div>\n";

	}

}



if (!function_exists('vMensaje')){

	function vMensaje($mensaje, $icon=null, $class=null){

		echo "<div class='" . $class . "' role='group'>\n";

		echo "<strong>";

		if ($icon != ''){

			echo "<i class='" . $icon . "'></i> ";

		}

		echo $mensaje;

		echo "</strong>\n";

		echo "</div>\n";

	}

}



if (!function_exists('vMensajeAlerta')){

	function vMensajeAlerta($mensaje, $icon=null){

		vMensaje($mensaje, $icon, "alert alert-danger");

	}

}



if (!function_exists('vMensajeInformacion')){

	function vMensajeInformacion($mensaje, $icon=null){

		vMensaje($mensaje, $icon, "alert alert-info");

	}

}



/* *********************************************************************** */

// vFicha

class fichaItem{

	public $campoEtiqueta;

	public $campoValor;

	function __construct(array $prop=array()){

		foreach($prop as $key => $value){

			$this->{$key} = $value;

		}

	}

	public static function create($campoEtiqueta, $campoValor){

		return new fichaItem(array("campoEtiqueta"=>$campoEtiqueta, "campoValor"=>$campoValor));

	}

}

if(!function_exists('vFicha')){

	function vFicha($fichaItems, $ancho=null){

		echo "<table class='table' cellspacing='0' width='100%'>\n";

		foreach($fichaItems as $item){

			echo "<tr>\n";

			echo "<td";

			if($ancho <> null)

			echo " width='".$ancho."' ";

			echo ">";

			echo "<strong>" . $item->campoEtiqueta . "</strong>";

			echo "</td>\n";

			echo "<td>" . $item->campoValor . "</td>\n";

			echo "</tr>\n";

		}

		echo "</table>\n";

	}

}



/* *********************************************************************** */



/* *********************************************************************** */

// vFormBusquedaReporte

/* *********************************************************************** */

if(!function_exists('vComboBoxReporte')){

	function vComboBoxReporte($url, $id, $arrayData, $campoCodigo, $campoValor,$js=NULL,$selec=NULL){

		echo "<form action='" . $url . "' class='form-inline' method='get'>\n";

		echo "<div class='input-group'>\n";

		echo "<select id='" . $id . "' name='" . $id . "' class='form-control input-md' ".$js." > \n";

		echo "<option value='' >Todos</option>\n";

		if(isset($arrayData)){

			foreach($arrayData as $row){

				echo "<option value='" . $row[$campoCodigo] . "' ";

				echo ($row[$campoCodigo] === $selec) ? ("selected=\"selected\"") : ("");

				echo " >" . $row[$campoValor] . "</option>\n";

			}

		}

		echo "</select>\n";

		echo "<div class='input-group-btn'>\n";

		echo "<button class='btn btn-primary' type='submit' title='Buscar'>\n";

		echo "<i class='glyphicon glyphicon-search'></i>";

		echo "</button>\n";

		echo "</div>\n";

		echo "</div>\n";

		echo "</form>\n";

	}

}



/* *********************************************************************** */



/* *********************************************************************** */

// vFormBusqueda

/* *********************************************************************** */

if(!function_exists('vFormBusquedaSimple')){

	function vFormBusquedaSimple($url, $idCampoBusqueda, $campoBusquedaValor){

		echo "<form action='" . $url . "' class='form-inline' method='get'>\n";

		echo "<div class='input-group'>\n";

		echo "<input type='text' class='form-control' name='". $idCampoBusqueda . "' value='" . $campoBusquedaValor. "' >\n";

		echo "<div class='input-group-btn'>\n";

		if($campoBusquedaValor <> ''){

			echo "<a href='" . $url . "' class='btn btn-default' title='Limpiar'>\n";

			echo "<i class='glyphicon glyphicon-repeat'></i>";

			echo "</a>\n";

		}

		echo "<button class='btn btn-primary' type='submit' title='Buscar'>\n";

		echo "<i class='glyphicon glyphicon-search'></i>";

		echo "</button>\n";

		echo "</div>\n";

		echo "</div>\n";

		echo "</form>\n";

	}

}

/* *********************************************************************** */





/* *********************************************************************** */

// vTable

class modelFieldItem{

	public $nombre;

	public $nombreData;

	public $nombreMostrar;

	public $formato="";

	public $hAlign="";

	public $ancho="";

	public $selectionControlName="";

	public $selectionControlValue="";

	public $arrayAcciones=null;

	public $arrayReglas=null;
	
	public $enlaceUrl="";

	public $title="";

	function __construct(array $prop=array()){

		foreach($prop as $key => $value){

			$this->{$key} = $value;

		}

	}

	public static function radioButton($controlName, $columnNameID){

		return new modelFieldItem(array("nombre"=>"selection", "nombreData"=>"only_selection",

								"nombreMostrar"=>"#", 

								"selectionControlName"=>$controlName, "selectionControlValue"=>$columnNameID,

								"hAlign"=>"center","ancho"=>"60px"));

	}

	public static function checkBox($controlName, $columnNameID){

		return new modelFieldItem(array("nombre"=>"selection", "nombreData"=>"multi_selection",

								"nombreMostrar"=>"#", 

								"selectionControlName"=>$controlName, "selectionControlValue"=>$columnNameID,

								"hAlign"=>"center","ancho"=>"60px"));

	}
	
	/*
	public static function LinkCell($nombre, $nombreData, $enlaceUrl, $nombreMostrar = ''){
		return new modelFieldItem(
								array
								(
								"nombre"=>$nombre,
								"nombreData"=>$nombreData,
								"nombreMostrar"=>$nombreMostrar, 
								"enlaceUrl" => $enlaceUrl,
								"hAlign"=>"center"
								)
								);
	}
	*/

}

class modelFieldAction{

	public $url;

	public $icono;

	public $class;

	public $titulo;

	public $columnNameID;

	public $onClick = null;

	public $text = "";

	public $tooltip = null;
	
	public $spinner = false;

	function __construct(array $prop=array()){

		foreach($prop as $key => $value){

			$this->{$key} = $value;

		}

	}

	public static function btnView($url, $columnNameID){

		return new modelFieldAction(array("url"=>$url."/_id_", "columnNameID"=>$columnNameID, "class"=>"btn btn-sm btn-info", "icono"=>"glyphicon glyphicon-zoom-in","tooltip"=>"Ver Detalle"));

	}

	public static function btnEdit($url, $columnNameID){

		return new modelFieldAction(array("url"=>$url."/_id_", "columnNameID"=>$columnNameID, "class"=>"btn btn-sm btn-primary", "icono"=>"glyphicon glyphicon-pencil","tooltip"=>"Editar"));

	}

	public static function btnDelete($url, $columnNameID){

		return new modelFieldAction(array("url"=>$url."/_id_", "columnNameID"=>$columnNameID, "class"=>"btn btn-sm btn-danger", "icono"=>"glyphicon glyphicon-trash","tooltip"=>"Eliminar","onClick"=>"ShowDialogQuestion('PREGUNTA','¿Desea eliminar el registro seleccionado','_url_')"));

	}
	// Creado el 08/03/2023
	public static function btnEditJS($js, $columnNameID){
		return new modelFieldAction(array("class"=>"btn btn-sm btn-info","icono"=>"glyphicon glyphicon-pencil","tooltip"=>"Modificar","columnNameID"=>$columnNameID,"onClick"=>$js."('_id_')"));
	}
	public static function btnVerAnalisisJS($js, $columnNameID){
		return new modelFieldAction(array("class"=>"btn btn-sm btn-warning", "icono"=>"fa fa-flask","tooltip"=>"Ver Analisis","columnNameID"=>$columnNameID,"onClick"=>$js."('_id_')"));
	}
	public static function btnCrearAnalisisJS($js, $columnNameID){
		return new modelFieldAction(array("class"=>"btn btn-sm btn-success", "icono"=>"fa fa-plus-square","tooltip"=>"Agregar Análisis","columnNameID"=>$columnNameID,"onClick"=>$js."('_id_')"));
	}

}

class modelFieldRule{

	public $fieldValueCase;

	public $propertyChange;

	public $propertyValue;

	function __construct(array $prop=array()){

		foreach($prop as $key => $value){

			$this->{$key} = $value;

		}

	}

}

if(!function_exists('vTable')){

	function vTable($modelField, $arrayData,$per_page, $id=null){

		$actionSeparator = "";

		$td_style = "";

		$rowBackcolor = "";

		foreach($modelField as $item){

			if($item->nombreMostrar == '')

			$item->nombreMostrar = $item->nombre;

		}

		echo "<div ";

		if ($id<>null) echo "id='" . $id . "' ";

		echo " class='table-responsive'>\n";

		echo "<table id='table' class='table table-striped table-bordered' cellspacing='1' width='60%'>\n";

		echo "<thead>\n";
		echo "<tr>\n";

		foreach($modelField as $item){

			if ($item->ancho == "0px" || $item->ancho == "0%"){


			}

			else{

				echo "<th class='text-center' title='$item->title'>";
				if ($item->nombreData === 'multi_selection'){
					echo "<input type='checkbox' name='" . $id . "CheckedAll' id='" . $id . "CheckedAll' />";
				}
				else{
					echo $item->nombreMostrar;	
				}
				echo "</th>\n";

			}

		}

		echo "</tr>\n";
		echo "</thead>\n";
		echo "<tbody>\n";

		if($arrayData <> null){

			foreach($arrayData as $row){
				
				$td_style = "";

				$rowBackcolor = "";

				echo "<tr ";

				foreach($modelField as $item){

					if($item->arrayReglas != null){

						foreach($item->arrayReglas as $itemRule){

							if($row[$item->nombreData] == $itemRule->fieldValueCase){

								switch($itemRule->propertyChange){

									case 'Row.BackColor':

									$rowBackcolor = $itemRule->propertyValue;

									break;

								}

							}

						}

						if($rowBackcolor != ''){

							$td_style = "background-color:" . $rowBackcolor . ";";

						}

						if($td_style != ''){

							echo " style='" . $td_style . "' ";

						}

					}

				}

				echo ">\n";

				foreach($modelField as $item){

					if ($item->ancho == "0px" || $item->ancho == "0%"){

						//No print <td>

					}

					else{

						echo "<td ";

						switch($item->hAlign){

							case "center":

							echo "class='text-center' ";

							break;

							case "right":

							echo "class='text-right' ";

							break;

						}

						switch($item->ancho){

							case '':

							echo "";//echo "width='60px' ";	

							break;

							default:

							echo "width='".$item->ancho."' ";

							break;

						}

						echo ">";

						if($item->arrayAcciones == null){

							switch($item->nombreData){

								case 'per_page': //para imprimir numeración

									echo ++$per_page;

									break;

								case 'only_selection':

									echo "<input type='radio' id='" . $item->selectionControlName . "' name='" . $item->selectionControlName . "' value='" . $row[$item->selectionControlValue] ."' />";

									break;

								case 'multi_selection':

									echo "<input type='checkbox' name='" . $item->selectionControlName . "[]' value='" . $row[$item->selectionControlValue] ."' />";

									break;

								default:
									$valueReplace = null;
									if($item->arrayReglas != null){
										foreach($item->arrayReglas as $itemRule){
											if($row[$item->nombreData] == $itemRule->fieldValueCase){
												switch($itemRule->propertyChange){
													case 'Cell.Value':
														$valueReplace = $itemRule->propertyValue;
														break;
												}
											}
										}
									}
									if ($item->nombreData != ''){
										if ($valueReplace == null){
											switch($item->formato){
												case "":
													echo $row[$item->nombreData];
													break;
												case "*":
													echo cValores($row[$item->nombreData]);
													break;
												case "dd/mm/yyyy":
													echo cFechaV($row[$item->nombreData]);
													break;
												case "DOC"://para imprimir link de archivo
													if($row[$item->nombreData]){
														vArchivoPDF($row[$item->nombreData]);
													}
												case "PDF":
													if($row[$item->nombreData]){
														$url = str_replace("_nombreDataValue_", $row[$item->nombreData], $item->enlaceUrl);
														vLink("linkArchivo",NULL,"#","fa fa-file-pdf-o",
															"btn btn-default btn-circle btn-lg ",
															"Ver Archivo",
															"ShowDialogInformationView('".$item->nombreMostrar."','".site_url($url)."')"
															);
													}
													break;
												break;
											}
										}
										else{
											echo $valueReplace;
										}
									}
									break;
							}

							/*

							if($item->nombreData === 'per_page')//para imprimir numeración

							{

								echo ++$per_page;

							}elseif($item->nombreData != '' and $item->nombreData != 'per_page')//distinto a numeración

							{

								switch($item->formato){

									case "":

										echo $row[$item->nombreData];

										break;

									case "*":

										echo cValores($row[$item->nombreData]);

										break;

									case "dd/mm/yyyy":

										echo cFechaV($row[$item->nombreData]);

										break;

									case "DOC"://para imprimir link de archivo

										if($row[$item->nombreData]){

											vArchivoPDF($row[$item->nombreData]);

										}

									break;

								}

							}

							*/

						}

						else{

							$ct=1;//valor para la barra " | "

							foreach($item->arrayAcciones as $itemAccion){

								$url = "";

								if($itemAccion->columnNameID <> "")

									$url = str_replace("_id_", $row[$itemAccion->columnNameID], $itemAccion->url);

								if($itemAccion->onClick == '')

									vButton("", $itemAccion->text, $url, $itemAccion->icono, $itemAccion->class);

								else

								{

									$link = $itemAccion->onClick;

									$link = str_replace("_url_",$url, $link);

									$link = str_replace("_id_",$row[$itemAccion->columnNameID], $link);

									vButtonDefault("", "", $url, $itemAccion->icono, 

													$itemAccion->class, $link, $itemAccion->tooltip, false);

								}

								if ($ct<count($item->arrayAcciones)) echo ' '.$actionSeparator.' ';

								$ct=$ct+1;//aumenta en uno el contador, por ciclo

								//echo ' | ';

							}

						}

						echo "</td>\n";

					}

				}

				echo "</tr>\n";

			}

		}

		echo "</tbody>\n";
		echo "</table>\n";

		echo "</div>\n";

	}

}

/* *********************************************************************** */

/* *********************************************************************** */





/* *********************************************************************** */

// vPropertyRules

class objectPropertyRule{

	public $objectID;

	public $objectProperty;

	public $bPropertyValue = null;

	public $sPropertyValue = null;

	function __construct(array $prop=array()){

		foreach($prop as $key => $value){

			$this->{$key} = $value;

		}

	}

	public static function setDisabled($objectID, $propertyValue){

		$Rule = new objectPropertyRule(array("objectID"=>$objectID, "objectProperty"=>"disabled"));

		$Rule->bPropertyValue = $propertyValue ? "1" : "0";

		return $Rule;

	}

	public static function setHiden($objectID, $propertyValue){

		$Rule = new objectPropertyRule(array("objectID"=>$objectID, "objectProperty"=>"hiden"));

		$Rule->bPropertyValue = $propertyValue ? "1" : "0";

		return $Rule;

	}

}

if(!function_exists('vObjectSetRules')){

	function vObjectSetRules($arrayRules){

		$str_rule = "";

		$str_value = "";

		$rules = array();

		foreach($arrayRules as $itemRule){

			$str_rule = "{ objectID:'" . $itemRule->objectID . "', objectProperty:'" . $itemRule->objectProperty . "',";

			if ($itemRule->bPropertyValue != null) {

				$str_value = $itemRule->bPropertyValue == "1" ? "true" : "false" ;

				$str_rule = $str_rule . " propertyValue:" . $str_value;

				}

			$str_rule = $str_rule . "}";

			$rules[] = $str_rule;

		}

		echo "\n";

		echo "var objectProperties = [";

		echo implode (", ", $rules);

		echo "];\n";

		echo "ControlSetProperties(objectProperties);";

	}

}



/* *********************************************************************** */





if(!function_exists('vMenuItem')){

	function vMenuItem($url, $texto, $icon=null){

		echo "<li>";

		echo "<a href='" . site_url($url) ."'>";

		if ($icon != null)

			echo "<i class='" . $icon . "'></i>";

		echo " ".$texto;

		echo "</a>";

		echo "</li>\n";

	}

}



if (!function_exists('vMenu')){

	function vMenu($texto, $icon=null){

		echo "<a href='#'>";

		if ($icon != null)

			echo "<i class='" . $icon ."'></i>";

		echo " ".$texto;

		echo "<span class='fa arrow'></span>";

		echo "</a>";

	}

}





/* ***************************************************************** */

// UPDATE: 2017-05-05

/* ***************************************************************** */

if(!function_exists('vComboBox_SetValue')){

	function vComboBox_SetValue($id, $valor){

		echo "$('#" . $id . "').val(" . $valor . ").change();";

	}

}

/* ***************************************************************** */





/* ***************************************************************** */

// UPDATE: 2017-05-21

/* ***************************************************************** */

if(!function_exists('vCheckBox')){

	function vCheckBox($name, $campoValor, $checked, $for=null){

		echo "<div class=\"checkbox\">";

		echo "<label style=\"font-weight: bold;\">";

		echo "<input type=\"checkbox\" id=\"". $name . "\" name=\"" . $name . "\" ";

		if ($checked == TRUE) echo " checked ";

		if ($for != null)

			echo " onchange =\"$('#" . $for . "').prop('disabled', !this.checked);\" ";

		echo " >";

		echo $campoValor;

		echo "</label>";

		echo "</div>";

	}

}



class objectDictionary{

	public $nombre;

	public $value;

	function __construct(array $prop=array()){

		foreach($prop as $key => $value){

			$this->{$key} = $value;

		}

	}

}



if (!function_exists('vRadioButton')){

	function vRadioButtonInline($id, $items, $campoValor){

		echo "<div class=\"input-group\">";

		foreach($items as $item){

			echo "<label class=\"radio-inline\" for=\"radios-0\">";

			echo "<input type=\"radio\" name=\"" . $id . "\" id=\"" . $id . "\" value=\"" . $item->value . "\" ";

			if ($campoValor == $item->value){

				echo " checked ";

			}

			echo ">";

			echo $item->nombre;

			echo "</label>";

		}

		echo "</div>";

	}

}	

/* ***************************************************************** */





/* ***************************************************************** */

// UPDATE: 2017-08-13

/* ***************************************************************** */

if (!function_exists('vTextBoxSearch')){

	function vTextBoxSearch($id, $campoValor, $placeholder=null){

		echo "<div class=\"input-group\">";

		echo "<input class=\"form-control\" id=\"" . $id . "\" name=\"" . $id . "\" ";

		echo "value=\"" . $campoValor . "\" type=\"text\" ";

		if ($placeholder !=null)

			echo "placeholder='" . $placeholder . "' ";

		echo ">";

		echo "<div class=\"input-group-btn\">";

		echo "<button class=\"btn btn-primary\" id=\"" . $id . "_Button\" type=\"button\" title=\"Buscar\">";

		echo "<i class=\"glyphicon glyphicon-search\"></i></button>";

		echo "</div>";

		echo "</div>";

	}

}



if(!function_exists('vCheckLabel')){

	function vCheckLabel($name, $campoValor, $checked, $trueValue, $falseValue, $divClass=null){

		if ($divClass!=null)

			echo "<div class=' . $divClass . '>";

		vLabel('', '(' . ($checked == true ? ' '.$trueValue.' ' : ' '.$falseValue.' ') . ') ' . $campoValor);

		if ($divClass!=null)

			echo "</div>";

	}

}



if(!function_exists('vFotoThumbnail')){

	function vFotoThumbnail($divName, $divTittle, $width, $height, $defaultImagePath, $showButtons = true, $checkBoxOmitir = false, $imageStyle = null){

		if ($imageStyle == null) $imageStyle = "border:1px solid #000000";

		$imagePath = base_url($defaultImagePath);

		$onEdit = "fotoEdit('" . $divName . "','" . $divTittle . "');";

		$onRemove = "fotoRemove('" . $divName . "','" . $divTittle . "');";

		echo "<div id=\"" . $divName . "\" class=\"col-xs-12 col-sm-4 col-lg-4\" style=\"height:" . ($height + 70) . "px\">\n";

		echo "<div style=\"width:" . $width . "px; height:" . $height . "px;\">\n";

		//titulo

		echo "<div class=\"row\" style=\"text-align:center\">";

			echo "<strong>" . $divTittle . "</strong>";

		echo "</div>\n";

		//Imagen

		echo "<img id=\"" . $divName . "_img\" name=\"" . $divName . "_img\" src=\"" . $imagePath . "\"";

			echo "width=\"160\" height=\"160\" style='" . $imageStyle . "'";

			echo "onclick=\"" .$onEdit . "\" ";

			echo "/>\n";

		echo "<div class=\"btn-group\" role=\"group\" aria-label=\"...\" style=\"width:100%\">\n";

		//Botones

		if ($showButtons == true){

			echo "<button type=\"button\" class=\"btn btn-primary\" onclick=\"" . $onEdit . "\"><i class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></i></button>\n";

			if ($checkBoxOmitir == true){

				echo "&nbsp;&nbsp;";

				echo "<input id=\"chk" . $divName . "\" name=\"chk" . $divName . "\" type=\"checkbox\"> Omitir";

			}

			echo "<button type=\"button\" class=\"btn btn-danger pull-right\" onclick=\"" . $onRemove . "\"><i class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></i></button>\n";	

		}

		echo "</div>\n";

		echo "</div>\n";

		echo "</div>\n";		

	}

}



//vTableField

class tableCell{

	public $tag="";

	public $colspan;

	public $rowspan;

	public $class;

	public $text;

	function __construct(array $prop=array()){

		foreach($prop as $key => $value){

			$this->{$key} = $value;

		}

	}

	public static function cellTittle($text, $colspan, $class="text-left", $rowspan="1"){

		return new tableCell(array("tag"=>"th", "text"=>$text, "colspan"=>$colspan, "class"=>$class, "rowspan"=>$rowspan));

	}

	public static function cellValue($text, $colspan, $class="text-left", $rowspan="1"){

		return new tableCell(array("tag"=>"td", "text"=>$text, "colspan"=>$colspan, "class"=>$class, "rowspan"=>$rowspan));

	}

}



if(!function_exists('vTableField')){

	function vTableField($tableContenido){

		echo "<table class='table table-th table-bordered' cellspacing='1' width='100%'>" . "<br />";

		foreach($tableContenido as $item){

			echo "<tr>";

			for ($i=0; $i<count($item); $i++){

				echo "<" . $item[$i]->tag . " ";

				echo "colspan='" . $item[$i]->colspan . "' ";

				echo "rowspan='" . $item[$i]->rowspan . "' ";

				echo "class='" . $item[$i]->class . "' ";

				echo ">";

				echo $item[$i]->text;

				echo "</" . $item[$i]->tag . ">";

			}

			echo "</tr>";

		}

		echo "</table>";

	}

}

/* ***************************************************************** */





/* ***************************************************************** */

// UPDATE: 2017-08-28

/* ***************************************************************** */

/*

if(!function_exists('vCheckBox_TextBox')){

	function vCheckBox_TextBox($name, $campoValor, $checked, $for=null){

		echo "<div class=\"checkbox\">";

		echo "<label style=\"font-weight: bold;\">";

		echo "<input type=\"checkbox\" id=\"". $name . "\" name=\"" . $name . "\" ";

		if ($checked == TRUE) echo " checked ";

		if ($for != null)

			echo " onchange =\"$('#" . $for . "').prop('disabled', !this.checked);\" ";

		echo " >";

		echo $campoValor;

		echo "</label>";

		echo "</div>";

	}

}

*/

/* ***************************************************************** */





/* ***************************************************************** */

// UPDATE: 2017-09-10

/* ***************************************************************** */

if(!function_exists('vComboBoxLiveSearch')){

	function vComboBoxLiveSearch($id, $arrayData, $campoCodigo, $campoValor,$js=NULL,$selec=NULL,$default=false){

		echo "<select id='" . $id . "' name='" . $id . "' class='form-control input-md selectpicker' ";

		echo $js;

		echo " data-live-search='true' data-width='auto' data-size='10' ";

		echo " > \n";

		if($default == true){
			echo "<option value>Seleccione Opción</option>\n";
		} 

		if(isset($arrayData)){

			foreach($arrayData as $row){

				echo "<option value='" . $row[$campoCodigo] . "' ";

				echo ($row[$campoCodigo] == $selec) ? ("selected=\"selected\"") : ("");

				echo " >" . $row[$campoValor] . "</option>\n";

			}

		}

		echo "</select>\n";

	}

}

/* ***************************************************************** */





/* ***************************************************************** */

// UPDATE: 2017-09-14

/* ***************************************************************** */

if(!function_exists('PaginarCustom')){

	function PaginarCustom($url, $per_page, $form, $total, $pag, $dat, $titulo=NULL, $rep_data=NULL,$dataAdicional=NULL, $arrParametros=NULL){

		$ci =& get_instance();

		/*

		if($b <> ''){

			$config['base_url'] = base_url().$form.'?b='. urlencode($b);

			$config['first_url'] = base_url().$form.'?b='. urlencode($b);

		}

		else{

			$config['base_url'] = base_url() . $form;

			$config['first_url'] = base_url() . $form;

		}*/

		$config['base_url'] = base_url().$form.'?'. $url;

		$config['first_url'] = base_url().$form.'?'. $url;



		$config['total_rows'] = $total;

		$config['per_page'] = $pag;

		$config['page_query_string'] = TRUE;

		

		$ci->load->library('pagination');

		$ci->pagination->initialize($config);

		$dataPag         = array(

			'dataF'=> $dat,

			'titulo'	=> $titulo,

			'pagination'  => $ci->pagination->create_links(),

			'total_data'  => $config['total_rows'],

			'per_page'    => $per_page,

			'rep_data'	=> $rep_data,

		);

		if ($dataAdicional == NULL) $dataAdicional = array();

		if ($arrParametros == NULL) $arrParametros = array();

		//Retorno

		return $dataPag + $dataAdicional + $arrParametros;

	}

}

/* ***************************************************************** */





/* ***************************************************************** */

// UPDATE: 2017-10-06

/* ***************************************************************** */

if(!function_exists('dashboardItem')){

	function dashboardItem($titulo, $icono, $valor, $url, $class, $bsColor = null){

		if ($bsColor == null) $bsColor = "panel-primary";		

		echo "<div class='" . $class . "'>";

			echo "<div class='panel " . $bsColor . "' >"; 

				//Header 

				echo "<div class='panel-heading'>";

					echo "<div class='row'>";

						echo "<div class='col-xs-3'>";

							echo "<i class='" . $icono . "'></i>";

						echo "</div>";

						echo "<div class='col-xs-9 text-right'>";

							echo "<div class='huge'>" . $valor . "</div>";

							echo "<div>" . $titulo . "</div>";

						echo "</div>";

					echo "</div>";

				echo "</div>";

				//Footer

				echo "<a href='" . $url . "'>";

					echo "<div class='panel-footer'>";

						echo "<span class='pull-left'>";

							echo "Ver Detalles";

						echo "</span>";

						echo "<span class='pull-right'>";

							echo "<i class='fa fa-arrow-circle-right'></i>";

						echo "</span>";

						echo "<div class='clearfix'></div>";

					echo "</div>";

				echo "</a>";

			echo "</div>";

		echo "</div>";

	}

}

/* ***************************************************************** */





/* ***************************************************************** */

// UPDATE: 2017-10-26

/* ***************************************************************** */

if(!function_exists('vTextBoxArea')){

	function vTextBoxArea($id, $campoValor,$row=3, $required=true){

		echo "<textarea ";

		echo "class=\"form-control\" ";

		echo "id=\"" . $id . "\" name=\"" . $id . "\" ";

		echo "rows=\"" . $row . "\" ";

		if ($required == true)
			echo " required ";

		echo ">";

		echo "</textarea>";

	}

}



if(!function_exists('vExportTableToExcel')){

	function vExportTableToExcel($id, $texto, $icon=null, $class=null, $tooltip=null, $tableId){

		//Button

		vButtonDefault($id, $texto, "", $icon, $class, 

						"vExportTableToExcel(this,'".$tableId."')", 

						$tooltip, false);

		//Link

		echo "<a id='" . $id . "_file' href='' download=''></a>\n";

	}

}

/* ***************************************************************** */


/* ***************************************************************** */

// UPDATE: 2019-11-28

/* ***************************************************************** */
function stdToArray($obj){
  $reaged = (array)$obj;
  foreach($reaged as $key => &$field){
    if(is_object($field))$field = stdToArray($field);
  }
  return $reaged;
}
/* ***************************************************************** */

/* ***************************************************************** */

// UPDATE: 2023-02-01

/* ***************************************************************** */

if(!function_exists('vComboBoxMultiple')){

	function vComboBoxMultiple($id,$name, $arrayData, $campoCodigo, $campoValor,$js=NULL,$selec=NULL,$placeholder){

		echo "<select id='" . $id . "'multiple='multiple' name='" . $name . "' class='form-control select2' style='width: 100%'";

		echo $js;

		echo " data-placeholder='".$placeholder."'";

		echo " > \n";

		//--echo "<option value='0' disabled >Seleccione Opción</option>\n";

		if(isset($arrayData)){

			foreach($arrayData as $row){

				echo "<option value='" . $row[$campoCodigo] . "' ";

				echo (!is_bool(array_search($row[$campoCodigo],$selec,false))==true) ? ("selected=\"selected\"") : ("");

				echo " >" . $row[$campoValor] . "</option>\n";

			}

		}else{
			echo "<option value='0' >No se encontro datos</option>";
		}

		echo "</select>\n";

	}

}

/* ***************************************************************** */