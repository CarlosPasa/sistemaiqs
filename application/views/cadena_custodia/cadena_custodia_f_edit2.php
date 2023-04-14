<?php include viewPath('includes/header'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
    <small><?php echo $subTitulo; ?></small>
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo $accion; ?></h3>
      <div class="box-tools pull-right">
        <a href="<?php echo url('/'.$return_url) ?>" class="btn btn-flat btn-default">
          <i class="fa fa-arrow-left"></i> &nbsp;&nbsp; Regresar
        </a>
        <!--button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button-->
      </div>
    </div>

    <?php echo form_open_multipart($postAction,vFormAtributos("frmCadenaCustodia"), [ 'class' => 'form-validate' ]); ?>
    <div class="box-body">
      <?php vHidden('id', $id); ?>
      <div class="col-xs-12 col-md-1">
        <?php vLabel('txtCliente','Cliente'); ?>        
      </div>
      <div class="row">
        <div class="col-xs-12 col-md-3">
          <?php vComboBoxLiveSearch('cbCliente', stdToArray($cliente_data), 'id', 'nombre_cliente',NULL,$cbCliente); ?>
        </div>
        <div class="col-xs-12 col-md-1">
          <?php vLabel('txtContacto','Contacto'); ?>        
        </div>
        <div class="col-xs-12 col-md-3">
          <?php vComboBoxLiveSearch('cbContacto', stdToArray($empleado_data), 'id', 'nombre_empleado',NULL,$cbContacto); ?>
        </div>
        <div class="col-xs-12 col-md-1">
          <?php vLabel('txtProyecto','Proyecto/Programa'); ?>        
        </div>
        <div class="col-xs-12 col-md-2">
          <?php vComboBoxLiveSearch('cbProyecto', stdToArray($proyecto_data), 'id', 'nombre_proyecto',NULL,$cbProyecto); ?>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-12 col-md-1">
          <?php vLabel('txtDireccion','Dirección'); ?>
        </div>
        <div class="col-xs-12 col-md-2">
          <?php vTextBox('txtDireccion',$txtDireccion, 'Ingrese Dirección',null,null,null,null,false,"required"); ?>
        </div>
        <div class="col-xs-12 col-md-1">
          <?php vLabel('txtDistrito','Distrito'); ?>
        </div>
        <div class="col-xs-12 col-md-2">
          <?php vTextBox('txtDistrito',$txtDistrito, 'Ingrese Distrito',null,null,null,null,false,"required"); ?>
        </div>
        <div class="col-xs-12 col-md-1">
          <?php vLabel('txtProvincia','Provincia'); ?>
        </div>
        <div class="col-xs-12 col-md-2">
          <?php vTextBox('txtProvincia',$txtProvincia, 'Ingrese Provincia',null,null,null,null,false,"required"); ?>
        </div>
        <div class="col-xs-12 col-md-1">
          <?php vLabel('txtDepartamento','Departamento'); ?>
        </div>
        <div class="col-xs-12 col-md-2">
          <?php vTextBox('txtDepartamento',$txtDepartamento, 'Ingrese Departamento',null,null,null,null,false,"required"); ?>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-12 col-md-1">
          <?php vLabel('txtEmail','Email'); ?>
        </div>
        <div class="col-xs-12 col-md-2">
          <?php vTextBox('txtEmail',$txtEmail, 'Ingrese email',null,null,null,null,false,""); ?>
      	</div>
        <div class="col-xs-12 col-md-1">
          <?php vLabel('txtTelefono','Teléfono'); ?>
        </div>
        <div class="col-xs-12 col-md-2">
          <?php vTextBox('txtTelefono',$txtTelefono, 'Ingrese Teléfono',null,null,null,null,false,"",null,9); ?>
      	</div>
        <div class="col-xs-12 col-md-1">
          <?php vLabel('txtCelular','Celular'); ?>
        </div>
        <div class="col-xs-12 col-md-2">
          <?php vTextBox('txtCelular',$txtCelular, 'Ingrese Celular',null,null,null,null,false,"",null,9); ?>
      	</div>
        <div class="col-xs-12 col-md-1">
          <?php vLabel('txtFecha','Fecha'); ?>
        </div>
        <div class="col-xs-12 col-md-2">
          <?php vDateTimePicker('txtFecha',$txtFecha, null,null,true,true); ?>
      	</div>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-12 col-md-4">
          <?php vLabel('txtCliente','Muestrado por:'); ?>
          <?php vComboBoxMultiple('cbEmpleado','empleado[]', stdToArray($empleado_data), 'id', 'nombre_empleado',NULL,$empleados,"Seleccione Muestrador"); ?>
        </div>
        <div class="col-xs-12 col-md-6">
          <br>
          <input class="form-check-input" type="radio" name="chkCliente" id="chkCliente" value="CLIENTE" <?php if($option == 'CLIENTE') echo 'checked'?> >
          <?php vLabel('chkCliente','CLIENTE'); ?>
          <input class="form-check-input" type="radio" name="chkCliente" id="chkCliente2" value="IQS" <?php if($option == 'IQS') echo 'checked'?>>
          <?php vLabel('chkCliente2','IQS'); ?>
        </div>      
      </div>
      <!--div class="form-group">
        <?php vLabel('txtMuestrador','Monto'); ?>
        <?php vTextBox('txtMuestrador',$txtMuestrador, 'Ingrese monto',null,null,null,null,false,"required"); ?>
      </div-->

    </div>
    <!-- /.box-body -->

    <!-- /.box-footer-->
    <?php echo form_close(); ?>

    <div class="col-lg-12">
    <div class="box-header with-border">
      <div class="row text-right" style="padding-right: 1.5%;">
        <?php	vButtonDefault("btnDetalleNuevo", "Agregar muestra", "", "fa fa-plus", "btn btn-primary", "onMuestra_nuevo()","",false);	?>
      </div>
      <div id="gridDetalle" >
        <?php
        /*
          $Actions = array(new modelFieldAction(array("class"=>"btn btn-sm btn-info","icono"=>"glyphicon glyphicon-pencil","tooltip"=>"Modificar","columnNameID"=>"id","onClick"=>'onDetalle_edit("_id_")')),
                          new modelFieldAction(array("class"=>"btn btn-sm btn-warning", "icono"=>"fa fa-flask","tooltip"=>"Ver Analisis","columnNameID"=>"id","onClick"=>'listarMuestra("_id_")')),
                          new modelFieldAction(array("class"=>"btn btn-sm btn-success", "icono"=>"fa fa-plus-square","tooltip"=>"Agregar Análisis","columnNameID"=>"id","onClick"=>'onNuevo_analisis("_id_")')),
                          new modelFieldAction(array("class"=>"btn btn-sm btn-danger", "icono"=>"glyphicon glyphicon-trash","tooltip"=>"Eliminar","columnNameID"=>"id","onClick"=>'onDetalle_delete("_id_")'))
            );
          $modelFieldDetalle = array();
          array_push($modelFieldDetalle, new modelFieldItem(array("nombre"=>"Código de Muestra", "nombreData"=>"id","","ancho"=>"115px","hAlign"=>"center")) );
          array_push($modelFieldDetalle, new modelFieldItem(array("nombre"=>"Código de Campo/Puntos de Muestreo", "nombreData"=>"codigo_campo","ancho"=>"300px")) );
          array_push($modelFieldDetalle, new modelFieldItem(array("nombre"=>"Locación/Ubicación", "nombreData"=>"ubicacion","hAlign"=>"center","ancho"=>"100px")) );
          array_push($modelFieldDetalle, new modelFieldItem(array("nombre"=>"Fecha de Muestreo", "nombreData"=>"fecha","hAlign"=>"right","ancho"=>"74px","hAlign"=>"center")) );
          array_push($modelFieldDetalle, new modelFieldItem(array("nombre"=>"Hora de Muestreo", "nombreData"=>"hora","hAlign"=>"right","ancho"=>"67px","hAlign"=>"center")) );
          array_push($modelFieldDetalle, new modelFieldItem(array("nombre"=>"CP", "nombreData"=>"contenedor_p","hAlign"=>"right","ancho"=>"30px")) );
          array_push($modelFieldDetalle, new modelFieldItem(array("nombre"=>"CV", "nombreData"=>"contenedor_v","hAlign"=>"right","ancho"=>"30px")) );
          array_push($modelFieldDetalle, new modelFieldItem(array("nombre"=>"C Otros", "nombreData"=>"contenedor_otros","hAlign"=>"right","ancho"=>"30px")) );
          array_push($modelFieldDetalle,
                  new modelFieldItem(array("nombre"=>"Acciones", "arrayAcciones"=>$Actions,"hAlign"=>"center","ancho"=>"150px"))
                  );*/
        ?>
        <?php      
        $Actions = array();
        array_push($Actions, modelFieldAction::btnEditJS("onDetalle_edit","id"));
        array_push($Actions, modelFieldAction::btnVerAnalisisJS("listarMuestra","id"));
        array_push($Actions, modelFieldAction::btnCrearAnalisisJS("onNuevo_analisis","id"));
        array_push($Actions, modelFieldAction::btnDelete(site_url("muestra/deleteAction"),"id"));
        $modelField = array(
          new modelFieldItem(array("nombre"=>"Código de Muestra", "nombreData"=>"id","","ancho"=>"115px","hAlign"=>"center")),
          new modelFieldItem(array("nombre"=>"Código de Campo/Puntos de Muestreo", "nombreData"=>"codigo_campo","ancho"=>"300px")),
          new modelFieldItem(array("nombre"=>"Locación/Ubicación", "nombreData"=>"ubicacion","hAlign"=>"center","ancho"=>"100px")),
          new modelFieldItem(array("nombre"=>"Fecha de Muestreo", "nombreData"=>"fecha","hAlign"=>"right","ancho"=>"74px","hAlign"=>"center")),
          new modelFieldItem(array("nombre"=>"Hora de Muestreo", "nombreData"=>"hora","hAlign"=>"right","ancho"=>"67px","hAlign"=>"center")),
          new modelFieldItem(array("nombre"=>"CP", "nombreData"=>"contenedor_p","hAlign"=>"right","ancho"=>"30px","title"=>"Contenedores P")),
          new modelFieldItem(array("nombre"=>"CV", "nombreData"=>"contenedor_v","hAlign"=>"right","ancho"=>"30px","title"=>"Contenedores V")),
          new modelFieldItem(array("nombre"=>"C Otros", "nombreData"=>"contenedor_otros","hAlign"=>"right","ancho"=>"30px")),
          new modelFieldItem(array("nombre"=>"Acciones", "arrayAcciones"=>$Actions,"hAlign"=>"center","ancho"=>"150px"))
        );
        vTable($modelField, stdToArray($dataDetalle), 0, 'gridDetalle');
      ?>
      </div>
      <div style=" position: relative;top: -20px;">
        <table id="gridDetalle_table" class="table table-hover" cellspacing="0" width="100%" >
          <thead>
            <tr>
              <th class="text-center" width="120px"></th>
              <th class="text-center" width="457.267px"></th>
              <th class="text-center" width="64.86px"></th>
              <th class="text-center" width="77.43px"></th>
              <th class="text-center" width="70px"></th>
              <th class="text-center" width="91.03"></th>
              <th class="text-center" width="157px"></th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <div class='table-responsive'>
    <table id='table' class='table table-striped table-bordered' cellspacing='1' width='60%'>
        <thead>
          <tr>
            <th class='text-center' width="220px">Datos</th>
            <th class='text-center'>Responsable</th>
            <th class='text-center'>Organización</th>
            <th class='text-center'>Fecha</th>
            <th class='text-center'>Hora</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class='text-left'>Transportado por:</th>
            <td class='text-center'><?php echo $persona_transportado?></td>            
            <td class='text-center'>IQS</td>
            <td class='text-center'><?php echo $fecha_transporte?></td>
            <td class='text-center'><?php echo $hora_transporte?></td>
          </tr>
          <tr>
            <th class='text-left'>Entregado por:</th>
            <td class='text-center'><?php echo $persona_entrega?></td>            
            <td class='text-center'>IQS</td>
            <td class='text-center'><?php echo $fecha_entrega?></td>
            <td class='text-center'><?php echo $hora_entrega?></td>
          </tr>
          <tr>
            <th class='text-left'>Ingresado por:</th>
            <td class='text-center'><?php echo $persona_ingreso?></td>            
            <td class='text-center'>IQS</td>
            <td class='text-center'><?php echo $fecha_ingreso?></td>
            <td class='text-center'><?php echo $hora_ingreso?></td>
          </tr>
          <tr>
            <th class='text-left'>Recibido en Laboratorio por:</th>
            <td class='text-center'><?php echo $laboratorista?></td>            
            <td class='text-center'>IQS</td>
            <td class='text-center'><?php echo $fecha_laboratorio?></td>
            <td class='text-center'><?php echo $hora_laboratorio?></td>
          </tr>          
        </tbody>
      </table>
    </div>
    <div class="col-lg-12">
      <div class="col-lg-6">
        <?php vLabel('taRMuestra','Observaciones de Recepción de Muestra'); ?>
        <?php vTextBoxArea($textAreaM, $textAreaM,5) ?>
      </div>
      <div class="col-lg-6">
        <?php vLabel('taRLaboratorio','Observaciones de Laboratorio'); ?>
        <?php vTextBoxArea($textAreaL, $textAreaL,5) ?>
      </div>      
    </div>
      <div id="divDetalle"></div>
    </div>
	</div>  
	<br><br>

    <div class="box-footer">

		<div class="box-tools pull-right">

			<button type="button" class="btn btn-flat btn-success" onClick="onDetalleDatos()"><i class="fa fa-save"></i> Guardar</button>

		</div>

	</div>
  </div>
  <!-- /.box -->
  

</section>
<!-- /.content -->
<script type="text/javascript">
  //Rellenar la tabla
	/*var $gridDetalle = {
		"nombre": "gridDetalle",
		"data": <?php echo json_encode($dataDetalle); ?>,
		"modelField": <?php echo json_encode($modelFieldDetalle); ?>
	};*/
  //$('table').DataTable({"autoWidth": false});
</script>
<script>
  $(document).ready(function() {
    //Para activar el js del combo multiple
    $('#cbEmpleado').select2();
    $('.form-validate').validate();
    //traemos de los campos la fecha
    var date = $('#txtFecha').val();
    //reemplazamos los - por / porque sino da un dia antes
    var fecha = new Date(date.replace(/-/g, '\/'));
    //Ponemos la fecha en el formato correcto
    $('#txtFecha').datepicker({ format: 'dd/mm/yyyy' }).datepicker("setDate", new Date(fecha));
    $('#chkCliente').change(function () {
        if ($(this).prop('checked')) {
            $('#chkIQS').prop('checked', false);
        }
    });
    //Cargar Rejillas
    //vTableInit($gridDetalle);
    $('#chkIQS').change(function () {
        if ($(this).prop('checked')) {
            $('#chkCliente').prop('checked', false);
        }
    });
  })
  //Validacion de que solo acepte numeros los input 
  vFormValidator_number('#frmCadenaCustodia #txtTelefono');
  vFormValidator_number('#frmCadenaCustodia #txtCelular');
  function onDetalle_reload(){
    location.reload();
    /*$.ajax({
      type: 'GET',
      url: '<?php echo site_url('/cadena_custodia/listar_muestras') ?>' + '/' + $("#id").val(),
      data: null,
      dataType: 'html',
      success: function (results) {
        resultsObj = jQuery.parseJSON(results);
        $gridDetalle.data = resultsObj.data;
        vTableRefresh($gridDetalle);        
        $("#pageSpin").hide();
      }
    });*/
  }
  function onMuestra_nuevo() {
    $url = '<?php echo site_url('muestra/nuevoModal') ?>';
    $("#pageSpin").show();
    $.ajax({
      type: 'GET',
      url: $url,
      data: { "id": 0, "idCadena": $("#id").val() },
      dataType: 'html',
      success: function (html) {
        $("#pageSpin").hide();
        $('#divDetalle').html(html);
        $('#modal_detalle').modal('show');
      }
    });
  }
  function onDetalle_edit(_id) {
    $url = '<?php echo site_url('muestra/edit') ?>'+ "/" + _id;
    $("#pageSpin").show();
    $.ajax({
      type: 'GET',
      url: $url,
      data: { "id": 0, "idCadena": $("#id").val() },
      dataType: 'html',
      success: function (html) {
        $("#pageSpin").hide();
        $('#divDetalle').html(html);
        $('#modal_detalle').modal('show');
      }
    });
  }
  function onDetalle_delete(_id){
    $url = "<?php echo site_url('muestra/deleteAction'); ?>" + "/" + _id;
    rpta = ShowDialogQuestion('PREGUNTA','¿Desea eliminar el registro seleccionado',$url);    
  }
  function onDetalleDatos(){
    var formData = new FormData($("#frmCadenaCustodia")[0]);
    $.ajax({
      type: 'POST',
      url: $("#frmCadenaCustodia").attr("action"),
      data: formData,
      cache:false,
      processData: false,
      contentType: false,
      success: function (results) {
        var obj = jQuery.parseJSON(results);
        if(obj['STATUS']=='true'){
          if(obj['mensaje'] != null ){
            ShowDialogInformation('Mensaje', obj['mensaje'], obj['redirect_url'])
          }
          if(obj['redirect_url'] != null){
            window.location.href = obj['redirect_url'];
          }
        }
        else{
            alerta('error',obj['mensaje'],'¡Importante! Corregir');
          }
      },
      error: function(request, status, error){
        $("#pageSpin").hide();
        var $html = $('<div></div>');
        $html.append(request.responseText);
        ShowDialogError($html);
      }
    });
	}
  function onNuevo_analisis(_id) {
    $url = '<?php echo site_url('analisis/nuevoModal') ?>'+ "/" + _id;
    $idMuestra = _id;
    $("#pageSpin").show();
    $.ajax({
      type: 'GET',
      url: $url,
      data: { "idMuestra": $idMuestra },
      dataType: 'html',
      success: function (html) {
        $("#pageSpin").hide();
        $('#divDetalle').html(html);
        $('#modal_detalle').modal('show');
      }
    });
  }
  function listarMuestra(_id) {
    $url = '<?php echo site_url('analisis/listarModal') ?>'+ "/" + _id;
    $idMuestra = _id;
    $("#pageSpin").show();
    $.ajax({
      type: 'GET',
      url: $url,
      data: { },
      dataType: 'html',
      success: function (html) {
        $("#pageSpin").hide();
        $('#divDetalle').html(html);
        $('#modal_detalle').modal('show');
      }
    });
  }
</script>

<?php include viewPath('includes/footer'); ?>

