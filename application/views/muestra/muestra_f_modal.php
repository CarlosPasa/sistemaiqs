<!-- Bootstrap modal -->
<div class="modal fade" id="modal_detalle" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
			<?php
				echo form_open($postAction, vFormAtributos("frmFichaMuestra"));
			?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Muestra <?php echo $idCadena?></h3>
            </div>
            <div class="modal-body form">
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
            <div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onClick="onMuestra_close();">Cancelar</button>
                <button type="button" class="btn btn-success" onClick="onMuestraSubmit()">Guardar</button>
            </div>
			<?php echo form_close() ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->


<!-- Validation -->
<script type="text/javascript">

</script>

<!-- Document.Ready() -->
<script type="text/javascript">
$(document).ready(function(){
	//calendario('txtHoraI');
	hora('txtHora');
	//traemos de los campos la fecha
    var date = $('#txtFechaMuestreo').val();
    //reemplazamos los - por / porque sino da un dia antes
    var fecha = new Date(date.replace(/-/g, '\/'));
    //Ponemos la fecha en el formato correcto
    $('#txtFechaMuestreo').datepicker({ format: 'dd/mm/yyyy' }).datepicker("setDate", new Date(fecha));

	vFormValidator_number('#frmFichaMuestra #txtCP');
  	vFormValidator_number('#frmFichaMuestra #txtCV');
	vFormValidator_number('#frmFichaMuestra #txtCO');
});
</script>

<script type="text/javascript">
	//Other Script
</script>

<!-- onSubmit() -->
<script type="text/javascript">
function onMuestraSubmit(){
	$("#pageSpin").show();
	var formData = new FormData($("#frmFichaMuestra")[0]);
	$.ajax({
		type: 'POST',
		url: $("#frmFichaMuestra").attr("action"),
		data: formData,
		cache:false,
		processData: false,
		contentType: false,
		success: function (results) {
			$("#pageSpin").hide();
			var obj = jQuery.parseJSON(results);
			console.log(obj);
			if (obj['STATUS']=='true'){
				onMuestra_close();
				alerta('success',obj['mensaje'],'¡Importante!');
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
function onMuestra_close() {
	$('#modal_detalle').modal('hide');
	onDetalle_reload();
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
function calendario(vista){//le doy formato de fecha(2019-08-04) en formato americano
	$('#'+ vista +'').datepicker({
		format: 'yyyy-mm-dd',//defino formato
		orientation: "bottom",//le digo que aparesca por debajo
		language: 'es',//defino el lenguaje
		autoclose: true,
		todayHighlight: true,
		toggleActive: true
	});
	$('#'+ vista +'').datepicker("setDate", new Date());//le paso la fecha actual
}
</script>