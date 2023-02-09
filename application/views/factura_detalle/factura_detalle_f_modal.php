<!-- Bootstrap modal -->
<div class="modal fade" id="modal_detalle" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
			<?php
				echo form_open($postAction, vFormAtributos("frmFichaDetalle"));
			?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Detalle</h3>
            </div>
            <div class="modal-body form">
				<div class="form-body">
					<fieldset style="margin-right: 30px;margin-left: 30px;">
						<?php vHidden('id', $id); ?>
						<?php vHidden('id_factura', $id_factura); ?>
						<div class="form-group">
							<?php vLabel('txtCantidad','Cantidad','col-md-3'); ?>
							<div class="col-xs-6 col-md-8">
								<?php vTextBox('txtCantidad',$txtCantidad, 'Ingrese cantidad',null,null,null,null,false,"required"); ?>
							</div>
						</div>
						<div class="form-group">
							<?php vLabel('id_producto','Producto','col-md-3'); ?>
							<div class="col-xs-6 col-md-8">
								<?php vComboBoxLiveSearch('id_producto', stdToArray($productos_data), 'id', 'nombre',NULL,$id_producto); 
								?>
							</div>
						</div>
						<div class="form-group">
							<?php vLabel('txtPrecio','Precio','col-md-3'); ?>
							<div class="col-xs-6 col-md-8">
								<?php vTextBox('txtPrecio',$txtPrecio, 'Ingrese precio',null,null,null,null,false,"required"); ?>
							</div>
						</div>
					</fieldset>
				</div>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onClick="onDetalle_close();">Cancelar</button>
                <button type="button" class="btn btn-success" onClick="onDetalleSubmit()">Guardar</button>
            </div>
			<?php echo form_close() ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->


<!-- Validation -->
<script type="text/javascript">
	vFormValidator_number('#frmFichaDetalle #txtCantidad');
	vFormValidator_decimal('#frmFichaDetalle #txtPrecio');
</script>

<!-- Document.Ready() -->
<script type="text/javascript">
$(document).ready(function(){
	$("#id_producto").selectpicker('refresh');
});
</script>

<script type="text/javascript">
	//Other Script
</script>

<!-- onSubmit() -->
<script type="text/javascript">
function onDetalleSubmit(){
	$("#pageSpin").show();
	var formData = new FormData($("#frmFichaDetalle")[0]);
	$.ajax({
		type: 'POST',
		url: $("#frmFichaDetalle").attr("action"),
		data: formData,
		cache:false,
		processData: false,
		contentType: false,
		success: function (results) {
			$("#pageSpin").hide();
			var obj = jQuery.parseJSON(results);
			console.log(obj);
			if (obj['STATUS']=='true'){
				onDetalle_close();
				if (obj['redirect_url'] != null){
					window.location.href = obj['redirect_url'];
				}
			}
			else{
				ShowDialogWarning('Información', obj['mensaje'],'');
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