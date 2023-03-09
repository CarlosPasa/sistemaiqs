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

    <?php echo form_open_multipart($postAction, [ 'id' => 'frmEmpleado', 'class' => 'form-validate' ]); ?>
	<div class="col-lg-12">
		<div class="box-body col-lg-6">
			<?php vHidden('id', $id); ?>
			<div class="form-group">
				<?php vLabel('txtSerie','Empleado'); ?>
				<?php vTextBox('txtNombreEmpleado',$txtNombreEmpleado, 'Ingrese Nombre del Empleado',null,null,null,null,false,"required"); ?>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>

    <div class="box-footer">
		<button type="button" class="btn btn-flat btn-primary" onClick="onDetalleSubmit()">Guardar</button>
    </div>
    <!-- /.box-footer-->
    
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

<?php include viewPath('includes/footer'); ?>

<!-- DocumentReady() -->
<script type="text/javascript">
  $(document).ready(function() {;
  })
</script>

<!-- onSubmit() -->
<script type="text/javascript">
	function onDetalleSubmit(){
		$("#pageSpin").show();
		var formData = new FormData($("#frmEmpleado")[0]);
		$.ajax({
			type: 'POST',
			url: $("#frmEmpleado").attr("action"),
			data: formData,
			cache:false,
			processData: false,
			contentType: false,
			success: function (results) {
				$("#pageSpin").hide();
				var obj = jQuery.parseJSON(results);
				console.log(obj);
				if (obj['STATUS']=='true'){
					if (obj['mensaje'] != null ){
						alerta('success',obj['mensaje'],'¡Importante!');					
						//ShowDialogInformation('Mensaje', obj['mensaje'], obj['redirect_url'])
					}
					if (obj['redirect_url'] != null){
						window.location.href = obj['redirect_url'];
					}
				}
				else{
					alerta('error',obj['mensaje'],'¡Importante!');
					//ShowDialogWarning('Información', obj['mensaje'],'');
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
</script>