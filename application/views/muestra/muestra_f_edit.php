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

    <?php echo form_open_multipart($postAction,vFormAtributos("frmMuestra"), [ 'class' => 'form-validate' ]); ?>
    <div class="box-body">
      <div class="form-body">
					<fieldset style="margin-right: 30px;margin-left: 30px;">
						<?php vHidden('id', $id); ?>
						<?php vHidden('idCadena', $idCadena); ?>
						<div class="form-group">
							<?php vLabel('txtCodigoCampo','Codigo de Campo/Puntos de Muestreo'); ?>
							<?php vTextBox('txtCodigoCampo',$txtCodigoCampo, 'Ingrese Codigo de Campo',null,null,null,null,false,"required"); ?>
						</div>
						<div class="form-group">
							<?php vLabel('txtUbicacion','Locación/Ubicación'); ?>
							<?php vTextBox('txtUbicacion',$txtUbicacion, 'Ingrese ubicacion',null,null,null,null,false,"required"); ?>
						</div>
						<div class="col-xs-6" style="position: relative;left: -30px;">
							<?php vLabel('txtCorrelativo','Fecha de Muestro'); ?>
							<?php vDateTimePicker('txtFechaMuestreo',$txtFechaMuestreo, null,null,true,true); ?>
						</div>
						<div class="col-xs-6">
							<?php vLabel('txtHora','Hora de Muestro'); ?>
							<?php vTextBox('txtHora',$txtHora, 'Ingrese hora de muestreo',null,null,null,null,false,"required"); ?>
						</div>						
						<div class="form-group text-center">
							<?php vLabel('lbContenedores','Nº de Contenedores'); ?>
						</div>
						<div class="row">
							<div class="col-xs-4 text-center">
								<?php vLabel('lbContenedores','P'); ?>
								<?php vTextBox('txtCP',$txtCP, '',null,null,null,null,false,"required"); ?>
							</div>
							<div class="col-xs-4 text-center">
								<?php vLabel('lbContenedores','V'); ?>
								<?php vTextBox('txtCV',$txtCV, '',null,null,null,null,false,"required"); ?>
							</div>
							<div class="col-xs-4 text-center">
								<?php vLabel('lbContenedores','Otros'); ?>
								<?php vTextBox('txtCO',$txtCO, '',null,null,null,null,false,"required"); ?>
							</div>
						</div>
					</fieldset>
				</div>
    </div>
    <!-- /.box-body -->

    <!-- /.box-footer-->
    <?php echo form_close(); ?>

    <div class="col-lg-12">
    <div class="box-header with-border">
      <div class="row text-right" style="padding-right: 1.5%;">
        <?php	vButtonDefault("btnDetalleNuevo", "Agregar análisis", "", "fa fa-plus", "btn btn-primary", "onNuevo_analisis()","",false);	?>
      </div>
      <div id="gridDetalle" >
        <?php      
       $Actions = array();
       if (hasPermissions('analisis_edit')) array_push($Actions, new modelFieldAction(array("class"=>"btn btn-sm btn-info","icono"=>"glyphicon glyphicon-pencil","tooltip"=>"Modificar","columnNameID"=>"id","onClick"=>"onAnalisis_edit('"."_id_"."')")));
       if (hasPermissions('analisis_delete')) array_push($Actions, modelFieldAction::btnDelete(site_url("analisis/deleteAction"),"id"));
       $modelField = array(
         new modelFieldItem(array("nombre"=>"ID", "nombreData"=>"id","hAlign"=>"center","ancho"=>"60px")),
         new modelFieldItem(array("nombre"=>"Codigo de Campo/Puntos de Muestreo", "nombreData"=>"nombre_analisis","hAlign"=>"center")),
         new modelFieldItem(array("nombre"=>"Locación/Ubicación", "nombreData"=>"ma","hAlign"=>"center")),
         new modelFieldItem(array("nombre"=>"CP", "nombreData"=>"pr","hAlign"=>"right","ancho"=>"30px")),
         new modelFieldItem(array("nombre"=>"Acciones", "arrayAcciones"=>$Actions,"hAlign"=>"center","ancho"=>"150px"))
       );
        vTable($modelField, stdToArray($dataDetalle), 0, 'gridDetalle');
      ?>
      </div>
    </div>
	</div>  
	<br><br>
  <div id="divDetalle"></div>
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
  //$('table').DataTable({"autoWidth": false});
</script>
<script>
  $(document).ready(function() {
    $('table').DataTable({"autoWidth": false});
    //traemos de los campos la fecha
    var date = $('#txtFechaMuestreo').val();
    //reemplazamos los - por / porque sino da un dia antes
    var fecha = new Date(date.replace(/-/g, '\/'));
    //Ponemos la fecha en el formato correcto
    $('#txtFechaMuestreo').datepicker({ format: 'dd/mm/yyyy' }).datepicker("setDate", new Date(fecha));
    //
    hora('txtHora');
  })
  //Validacion de que solo acepte numeros los input 
  vFormValidator_number('#frmMuestra #txtCP');
  vFormValidator_number('#frmMuestra #txtCV');
  vFormValidator_number('#frmMuestra #txtCO');
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
    $url = '<?php echo site_url('analisis/edit') ?>'+ "/" + _id;
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
    $url = "<?php echo site_url('analisis/deleteAction'); ?>" + "/" + _id;
    rpta = ShowDialogQuestion('PREGUNTA','¿Desea eliminar el registro seleccionado',$url);    
  }
  function onDetalleDatos(){
    var formData = new FormData($("#frmMuestra")[0]);
    $.ajax({
      type: 'POST',
      url: $("#frmMuestra").attr("action"),
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
  function onNuevo_analisis() {
    $url = '<?php echo site_url('analisis/nuevoModal') ?>'+ "/" + $("#id").val();
    $idMuestra = $("#id").val();
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
  function onAnalisis_edit(_id) {
	  onAnalisis_close();
    $url = '<?php echo site_url('analisis/editModal') ?>'+ "/" + _id;
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
  function onAnalisis_close() {
	$('.modal-backdrop').hide();
	$('#modal_detalle').modal('hide');
}
  function hora(nombre){
		$('#'+ nombre +'').timepicker({
			useCurrent: false,
			format: 'HH:mm:ss',
			minuteStep: 1,
			showSeconds: true,
			showMeridian: false,
			disableFocus: true,
			icons: {
			up: 'fa fa-chevron-up',
			down: 'fa fa-chevron-down'
		}
		}).on('focus', function() {
			$('#'+ nombre +'').timepicker('showWidget');
		});
  }
</script>

<?php include viewPath('includes/footer'); ?>

