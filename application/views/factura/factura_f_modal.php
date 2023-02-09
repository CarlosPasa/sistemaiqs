<!-- Bootstrap modal -->
<div class="modal fade" id="modal_factura" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
			<?php
				echo form_open($postAction, vFormAtributos("frmFichaFactura"));
			?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Factura</h3>
            </div>
            <div class="modal-body form">
				<div class="form-body">
					<fieldset style="margin-right: 30px;margin-left: 30px;">
						<?php vHidden('id', $id); ?>
						<div class="form-group">
							<?php vLabel('txtSerie','Serie'); ?>
							<?php vTextBox('txtSerie',$txtSerie, 'Ingrese serie',null,null,null,null,false,"required"); ?>
						</div>
						<div class="form-group">
							<?php vLabel('txtCorrelativo','Correlativo'); ?>
							<?php vTextBox('txtCorrelativo',$txtCorrelativo, 'Ingrese correlativo',null,null,null,null,false,"required"); ?>
						</div>
					</fieldset>
				</div>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onClick="onFactura_close();">Cancelar</button>
                <button type="button" class="btn btn-success" onClick="onFacturaSubmit()">Guardar</button>
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
</script>

<!-- onSubmit() -->
<script type="text/javascript">
function onFacturaSubmit(){
	$("#pageSpin").show();
	var formData = new FormData($("#frmFichaFactura")[0]);
	$.ajax({
		type: 'POST',
		url: $("#frmFichaFactura").attr("action"),
		data: formData,
		cache:false,
		processData: false,
		contentType: false,
		success: function (results) {
			$("#pageSpin").hide();
			var obj = jQuery.parseJSON(results);
			console.log(obj);
			if (obj['STATUS']=='true'){
				onFactura_close();
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