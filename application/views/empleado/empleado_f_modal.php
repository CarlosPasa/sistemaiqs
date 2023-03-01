<!-- Bootstrap modal -->
<div class="modal fade" id="modal_empleado" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
			<?php
				echo form_open($postAction, vFormAtributos("frmFichaEmpleado"));
			?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Empleado</h3>
            </div>
            <div class="modal-body form">
				<div class="form-body">
					<fieldset style="margin-right: 30px;margin-left: 30px;">
						<?php vHidden('id', $id); ?>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-6"><?php vTextBox('txtDni',$txtDni, 'Ingrese N° Dni',null,null,null,null,false,"required",null,8); ?></div>
								<div class="col-xs-3"><button type="button" class="btn btn-primary" onClick="ValidaDNIRUC('1','2502')" id="btnValidaDni"><i class="fa fa-check"></i> Valida</button></div>
							</div>
							<div class="row">
								<div class="col-xs-12"><?php vLabel('txtCorrelativo','Nombre del Empleado'); ?></div>
								<div class="col-xs-12"><?php vTextBox('txtNombreEmpleado',$txtNombreEmpleado, 'Ingrese nombre del empleado',null,null,null,null,false,"required"); ?></div>
							</div>
						</div>
					</fieldset>
				</div>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onClick="onEmpleado_close();">Cancelar</button>
                <button type="button" class="btn btn-success" onClick="onEmpleadoSubmit()">Guardar</button>
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
});
</script>

<script type="text/javascript">
	//Other Script
	vFormValidator_number('#frmFichaEmpleado #txtDni');
</script>

<!-- onSubmit() -->
<script type="text/javascript">
function onEmpleadoSubmit(){
	$("#pageSpin").show();
	var formData = new FormData($("#frmFichaEmpleado")[0]);
	$.ajax({
		type: 'POST',
		url: $("#frmFichaEmpleado").attr("action"),
		data: formData,
		cache:false,
		processData: false,
		contentType: false,
		success: function (results) {
			$("#pageSpin").hide();
			var obj = jQuery.parseJSON(results);
			console.log(obj);
			if (obj['STATUS']=='true'){
				onEmpleado_close();
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
function ValidaDNIRUC(tipoD){
	var parametro = $("#txtDni").val();
	$.ajax({
		type: 'POST',
		url:"<?php echo base_url(); ?>ValidaRucDni/getValidaRUCDNI",
		data:{
			Parametro: parametro,
			TipoDoc: tipoD,  //COD DNI
		},
		success:function(results)
		{
			var obj = jQuery.parseJSON(results);
			if(obj['STATUS']=='false'){
				alerta('error',obj['mensaje'],'¡Importante! Corregir');
			}
			else{
				$("#txtNombreEmpleado").val(obj['data']['nombre_completo']);
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