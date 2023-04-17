<!-- Bootstrap modal -->
<div class="modal fade" id="modal_detalle" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
			<?php
				echo form_open($postAction, vFormAtributos("frmFichaAnalisis"));
			?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Análisis <?php echo $idMuestra?></h3>
            </div>
            <div class="modal-body form">
				<div class="form-body">
					<fieldset style="margin-right: 30px;margin-left: 30px;">
						<?php vHidden('id', $id); ?>
						<?php vHidden('idMuestra', $idMuestra); ?>
						<div class="form-group">
							<?php vLabel('txtNombreAnalisis','Análisis'); ?>
							<?php vTextBox('txtNombreAnalisis',$txtNombreAnalisis, 'Ingrese Análisis rquerido',null,null,null,null,false,"required"); ?>
						</div>
						<div class="row">
							<div class="col-xs-6 text-center">
								<?php vLabel('lbMa','Ma'); ?>
								<?php vTextBox('txtMa',$txtMa, '',null,null,null,null,false,"required"); ?>
							</div>
							<div class="col-xs-6 text-center">
								<?php vLabel('lbPr','Pr'); ?>
								<?php vTextBox('txtPr',$txtPr, '',null,null,null,null,false,"required"); ?>
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
	
});
</script>

<script type="text/javascript">
$(function() {
    $('input').focusout(function() {	
        this.value = this.value.toLocaleUpperCase();
    });
});
</script>

<!-- onSubmit() -->
<script type="text/javascript">
function onMuestraSubmit(){
	$("#pageSpin").show();
	var formData = new FormData($("#frmFichaAnalisis")[0]);
	$.ajax({
		type: 'POST',
		url: $("#frmFichaAnalisis").attr("action"),
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
				alerta('success',obj['mensaje'],'Registro exitoso');
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
</script>